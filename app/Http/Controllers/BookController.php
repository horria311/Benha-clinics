<?php

namespace App\Http\Controllers;
use App\models\Cregister;
use App\models\Pregister;
use App\models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic_users = Cregister::all();
        return view('book', compact('clinic_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'bname' => 'required|max:100',
                'clinic_id' => 'required',
                'date' => 'required',
                'time' => 'required'
            ]
        );

        $time = book::where('time', '=', $request->input('time'))->first();
        $date = book::where('date', '=', $request->input('date'))->first();
        $Clinic = Cregister::where('id', '=', $request->input('clinic_id'))->first();
        if($time === null || $date === null || $Clinic === null)
        {
            
            $book = book::create(array( 
                'user_id' => session('id'),
                'clinic_id' => $_REQUEST['clinic_id'],
                'bname' => $_REQUEST['bname'],
                'date' =>  $_REQUEST['date'],
                'time' => $_REQUEST['time'],
                'bmessage' => $_REQUEST['bmessage']
                ));
            return redirect()->back()->with('message', ' * The appointment is added successfully * ');    
        }
        else
        {
            return redirect()->back()->with('message', ' * This appointment is already exist * ')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        
        $clinic_users = Cregister::all();
        return view('edit', compact('book','clinic_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $request->validate(
            [
                'bname' => 'required|max:100',
                'clinic' => 'required',
                'date' => 'required',
                'time' => 'required'
            ]
        );
        $time = book::where('time', '=', $request->input('time'))->first();
        $date = book::where('date', '=', $request->input('date'))->first();
        if($time === null || $date === null)
        {
            $book->update($request->all());

            return redirect('/home')->with('message', ' * The appointment is updated successfully * ');
        }
        else
        {
            return redirect()->back()->with('alert', ' * The appointment is already existed * ');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->back()->with('message', ' * The appointment is deleted successfully *');
    }
}
