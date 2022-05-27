<?php

namespace App\Http\Controllers;
use App\models\Cregister;
use Illuminate\Http\Request;

class CregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Clinic.Cregister');
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
            'cname' => 'required|max:100',
            'cemail' => 'required|email',
            'cphone' => 'required|max:20',
            'cnum' => 'required',
            'Password' => 'required|confirmed|min:6',
            'Password_confirmation' => 'required'
        ]);

        $cemail = Cregister::where('cemail', '=', $request->input('Cemail'))->first();
        $cum = Cregister::where('cum', '=', $request->input('cnum'))->first();
        if($cemail === null && $cum === null)
        {
            $cpassword = $request->Password;
            $cconfirm = $request->Password_confirmation;
            $cuser = Cregister::create(array(
                'cname'=> $_REQUEST['cname'], 
                'cemail'=> $_REQUEST['cemail'],
                'cnum' => $_REQUEST['cnum'],
                'cphone'=> $_REQUEST['cphone'], 
                'Password' => encrypt($cpassword),
                'Password_confirmation' => encrypt($cconfirm)
                ));
            
                $request->session()->put([
                    'id_clinic' => $cuser->id,
                    'CloggedIn'=>true,
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
