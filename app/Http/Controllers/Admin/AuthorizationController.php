<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class AuthorizationController extends Controller
{

    public function authorization()
    {
        if(Auth::guard('admin')->check()) {

            return view('admin.auth.notauthor');

        } else {
        	return redirect('/admin/login');
        }
    }

    public function verify(Request $request)
	 {
	 		$current_time = strtotime(Carbon::now());
	 		$id = Auth::guard('admin')->user()->id;
            $admin = Admin::findOrFail($id);

        if(Auth::guard('admin')->check()) {
   			if($current_time > Auth::guard('admin')->user()->verification_expire_at)
            {
                Auth::guard('admin')->logout();

                $request->session()->invalidate();
                $message = 'Code Expired!';
                return redirect('/admin/login')->withAlert($message);

            }

            if($admin->verification_code == $request->verification_code)
            {
            	$admin->is_auth = 1;
            	$admin->save();

            	return redirect('/admin/dashboard');

            }
            else{

            	return back()->withAlert('Invalid Verification Code.');
            }
        } else {
        	dd('not authenticate');
        }

	 }
}
