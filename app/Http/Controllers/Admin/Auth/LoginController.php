<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\VerificationCode;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
	 /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
	{
	 	return view('admin.auth.login');
	}

	    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $admin = Admin::whereEmail($request->email)->first();
        // dd($admin);


        $code = rand(100000, 999999);

        $data = array(
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'verfication' => $code
                );



        $response = $this->generateEmail($data);
        // dd($response);

        if($response == true) {

            $code_expire_at = strtotime(Carbon::now()) + 1800;

            DB::table('admins')
                ->where('email', $request->email)
                 ->update([
                    'verification_code' => $code,
                    'verification_expire_at' => $code_expire_at
                ]);

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);

        } else {
            return back()->withAlert('Email couldnt be send, plz try again');
        }


    }

    public function generateEmail($data)
    {
    //    dd( $data['email']);

        $objCode = new \stdClass();
        $objCode->email =$data['email'];
        $objCode->name = $data['name'];
        $objCode->code = $data['verfication'];


        try {

            Mail::to($data['email'])->send(new VerificationCode($objCode));

            return true;

        }

        catch(\Exception $e) {
            return false;
        }
    }

    public function logout(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::findOrFail($id);
        $admin->is_auth = 0;
        $admin->verification_code = '';
        $admin->save();
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/login');
    }

	protected function guard()
    {
        return Auth::guard('admin');
    }
 }
