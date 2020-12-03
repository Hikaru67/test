<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        if(Session::get('admin_id')){
            return Redirect::to('dashboard');
        }
    	return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
    	return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $this->AuthLogin();
    	$admin_username = $request->admin_username;
    	$admin_password = md5($request->admin_password);
		
    	$result = FacadesDB::table('tbl_admin')->where('admin_username', $admin_username)->where('admin_password', $admin_password)->first();
    	if($result){
			// $request->session()->put('admin_name', $result->admin_name);
			// $request->session()->put('admin_id', $result->admin_id);
			Session::put('admin_name', $result->admin_name);
			Session::put('admin_id', $result->admin_name);
    		return Redirect('/dashboard');
    	}
    	else
    	{
			// $request->session()->put('message', 'Tên tài khoản hoặc mật khẩu không chính xác');
			Session::put('message', 'Tên đăng nhập hoặc mật khẩu không chính xác');
			return Redirect::to('/admin');
    	}
	}
	
	public function logout()
	{
        $this->AuthLogin();
		Session::put('admin_name', null);
		Session::put('admin_id', null);
		return Redirect::to('/admin');
	}
}
