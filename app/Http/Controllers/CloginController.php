<?php

namespace App\Http\Controllers;
use App\models\Cregister;
use Illuminate\Http\Request;

class CloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Clinic.Clogin');
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
                'Cemail' => 'required',
                'cpassword' => 'required'
            ]
        );
        $Cemail = $request->Cemail;
        $Cpassword = $request->cpassword;
        $clogin = Cregister::where(['cemail' => $Cemail])->first();
        if( $clogin !== null && $Cpassword == decrypt($clogin->Password))
        {
            $request->session()->put([
                'id_clinic' => $clogin->id,
                'CloggedIn'=>true,
                'login' =>true,
                ]
            );     // store id of user in the session 

            return redirect('/home')->with('message', '* You are login successfully *');
        }
        else
        {
            return back()->with('error', 'Email Or Password is Incorrect!')->withInput();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->invalidate();
        return redirect('/home')->with('message', '* You are Log out *');
    }
}
