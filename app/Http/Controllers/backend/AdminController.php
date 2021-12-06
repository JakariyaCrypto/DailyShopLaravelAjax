<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\backend\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $pwd   = $request->post('password');
        $result = Admin::where(['email'=>$email, 'password'=>$pwd])->get();

        if(isset($result['0']->id)){
            
            $request->session()->put('admin_login',true);
            $request->session()->put('admin_id',$result['0']->id);
            return redirect()->route('admin.dashboard');

        }else{

            $request->session()->flash('error','Enter Valid Login Info');
            return redirect()->route('admin.login');

        }

    }

    /**
     * Display a listing of Dashboard the resource.
     *
     */
    public function dashboard(){

        return view('Admin.Dashboard.index');

    }



}
