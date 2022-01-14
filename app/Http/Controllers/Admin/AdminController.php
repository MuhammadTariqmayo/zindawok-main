<?php

 namespace App\Http\Controllers\Admin;

 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 

 use Auth;
 use App\Models\Admin;
 
 class AdminController extends Controller
 {
 
 	public function index()
     {
         return view('admin.dashboard');
     }
 /**
 * show dashboard.
 *
 * @return IlluminateHttpResponse
 */
	


	 
 }