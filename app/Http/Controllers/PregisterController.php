<?php

namespace App\Http\Controllers;
use App\models\Pregister;
use Illuminate\Http\Request;

class PregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Patient.Pregister');
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
        $request->validate([
            'pname' => 'required|max:100',
            'pusername' =>'required|max:100',
            'pemail' => 'required|email',
            'pphone' => 'required|max:20',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $pemail = Pregister::where('pemail', '=', $request->input('pemail'))->first();
        $username = Pregister::where('pusername', '=', $request->input('pusername'))->first();
        if($pemail === null && $username === null)
        {
            $ppassword = $request->password;
            $pconfirm = $request->password_confirmation;
            $puser = Pregister::create(array(
                'pname'=> $_REQUEST['pname'], 
                'pusername'=> $_REQUEST['pusername'], 
                'pemail'=> $_REQUEST['pemail'],
                'pphone'=> $_REQUEST['pphone'], 
                'password' => encrypt($ppassword),
                'password_confirmation' => encrypt($pconfirm)
                ));
                
                $request->session()->put([
                    'id' => $puser->id,
                    'PloggedIn'=>true,
                    'login' =>true
                    ]
                );
                
                return redirect('/home')->with('message', '* You are register successfully *');
        }
        else
        {
            return redirect()->back()->with('error', ' * This account is already exist * ')->withInput();
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
    public function destroy($id)
    {
        //
    }
}
