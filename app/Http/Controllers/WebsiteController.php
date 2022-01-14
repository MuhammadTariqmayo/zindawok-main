<?php

namespace App\Http\Controllers;

use App\Jobs\ContectEmailJob;
use App\Mail\MyDemoMail;
use App\Models\Industry;
use App\Models\JobHistory;
use App\Models\feedBack;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\City;
use App\Models\Contact;
use App\Models\Occupation;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')
            ->join('companies', 'jobs.company_id', '=', 'companies.id')
            ->join('occupations', 'jobs.occupation_id', '=', 'occupations.id')
            ->select('jobs.*', 'companies.name as company', 'occupations.name as occupation')
            ->get();

        $cities = City::all();

        $occupations = Occupation::whereNull('parent_id')->get();

        $provinces = Province::all();

        $industries = Industry::all();

        $showIndexPageJob = Job::all();

        return view('website.index', compact('jobs', 'cities', 'occupations', 'provinces', 'industries', 'showIndexPageJob'));
    }

    public function register()
    {
        return view('website.register');
    }
    // contactus function
    public function contactUs()
    {
        return view('website.contact.contactus');
    }
    public function contactCreate(Request $request)
    {
        

        //  $this->validate($request, [
        //     'company' => 'required',
        //     'uname' => 'required',
        //     'email' => 'required',
        //     'number' => 'required',
        //     'address' => 'required',
        //     'textarea' => 'required',

        // ]);



        $contact=$request->all();


          ContectEmailJob::dispatch($contact)->delay(now()->addSecond(20));

           return redirect()->back();



    }
    public function getContect()
    {
        $contect=Contact::get();
        try {
            foreach ($contect as $contects) {



        }
        return true;
    } catch(\Exception $e) {
            return false;
    }


    }
    // feedback function
    public function feedBack()
    {
        return view('website.feedback.feedback');
    }
    public function createFeedBack(Request $request)
    {
        // dd($request);

          $this->validate($request, [

            'emoji' => 'required',
            'comment' => 'required',

        ]);

        $feedback= new feedBack();
        $feedback->user_or_company_id=$request->company_id;
        $feedback->actor=$request->company;
        $feedback->name=$request->name;
        $feedback->email=$request->email;
        $feedback->reaction=$request->emoji;
        $feedback->comments=$request->comment;
        $feedback->save();
        return redirect()->back();


    }


    //  search base searching and count
    public function search($city_id = null, $occupation_id = null, $salary = null, $check = null)
    {

        $q = Job::query();

        if (!empty($city_id)) {
            $q->where('city_id', '=', $city_id);
        }

        if (!empty($occupation_id)) {
            $q->where('occupation_id', '=', $occupation_id);
        }

        if (!empty($salary)) {
            $q->where('end_salary', '=', $salary);
        }

        if (!empty($check)) {
            $q->where('type', '=', $check);
        }

        $jobs = $q->get();
        $totalJobs = count($jobs);

        return response()->json(['status' => 'success', 'jobs' => $totalJobs]);

    }

    public function searchJobs($city_id, $occupation_id, $salary, $type)
    {

        $searchJobs = Job::where('city_id', $city_id)
            ->where('occupation_id', $occupation_id)
            ->where('end_salary', $salary)
            ->where('type', $type)->get();

        $industries=Industry::all();
        $cities=City::all();

        return view('website.job.industry-search', compact('searchJobs','industries','cities'));

    }
    //  search base searching end here


    //  city base searching jobs and count
    public function countCityJobs($city_id)
    {

        $q = Job::query();

        if (!empty($city_id)) {
            $q->where('city_id', '=', $city_id);
        }

        $jobs = $q->get();
        $totalJobs = count($jobs);

        return response()->json(['status' => 'success', 'jobs' => $totalJobs, 'city_id' => $jobs]);

    }

    public function jobListing($city_id=null, $industry_id=null, $occupation_id=null, $sub_occupation_id=null, $salary=null, $type=null)
    {
        $q = Job::query();

        if (!empty($city_id)){
            $q->where('city_id', '=', $city_id);
        }

        if (!empty($city_id)  &&  !empty($industry_id)  &&  !empty($occupation_id)   &&  !empty($sub_occupation_id)  &&  !empty($salary)) {
            $q->where('city_id', $city_id)
              ->where('industry_id', $industry_id)
              ->where('occupation_id', $occupation_id)
              ->where('sub_occupation_id', $sub_occupation_id)
              ->where('end_salary', $salary);
        }

        $cityJobs = $q->get();

        $industries = Industry::all();

        $cities = City::all();

        return view('website.home.job-listings', compact('cityJobs','industries','cities'));
    }

    //  city base searching end here

    public function getOccupations($id)
    {

        $occupations = Occupation::select('id', 'name')
            ->where('industry_id', $id)
            ->whereNULL('parent_id')
            ->get()
            ->toArray();
        $industryCount = Job::where('industry_id', $id)->count();
        return response()->json([
            'status' => 'success',
            'occupations' => $occupations,
            'countIndustyJobs' => $industryCount
        ]);

    }

    public function getSubOccupations($id)
    {

        $occupations = Occupation::select('id', 'name')
            ->where('parent_id', $id)
            ->get()
            ->toArray();
        $occupationCount = Job::where('occupation_id', $id)->count();
        return response()->json([
            'status' => 'success',
            'occupations' => $occupations,
            'occupationCount' => $occupationCount
        ]);

    }

    public function getSubOccupationsCount($id)
    {

        $subOccupationCount = Job::where('sub_occupation_id', $id)->count();
        return response()->json([
            'status' => 'success',
            'subOccupationCount' => $subOccupationCount,
        ]);

    }

    //  industry base searching
    public function searchIndustryJobs($industry_id, $occupation_id = null, $sub_occupation_id = null)
    {

        $q = Job::query();

        if (!empty($industry_id) && empty($occupation_id) && empty($sub_occupation_id)) {
            $q->where('industry_id', '=', $industry_id);

        }

        if (!empty($occupation_id) && !empty($industry_id) && empty($sub_occupation_id)) {
            $q->where('occupation_id', '=', $occupation_id)
              ->where('industry_id', $industry_id);
        }

        if (!empty($sub_occupation_id) && !empty($occupation_id) && !empty($industry_id)) {
            $q->where('sub_occupation_id', '=', $sub_occupation_id)
              ->where('occupation_id', $occupation_id)
              ->where('industry_id', $industry_id);
        }

        $searchJobs = $q->get();

        $cities=City::all();

        $industries=Industry::all();

        return view('website.job.industry-search', compact('searchJobs','cities','industries'));

    }
    //  industry base searching end here



    //  get complete job detail and save history of just user's visit jobs
    public function JobDetail($id)
    {

        $job = Job::find($id);
        if (Auth::guard('web')->check()) {
            $checkJobHistory = JobHistory::where([
                ['user_id', Auth::id()],
                ['job_id', $id],
            ])->first();

            if ($checkJobHistory != null) {

            } else {
                $jobHistory = new JobHistory();
                $jobHistory->user_id = Auth::id();
                $jobHistory->job_id = $id;
                $jobHistory->save();
            }
        }

        return view('website.job.full-job-detail', compact('job'));

    }
    //  end here



    //  form for job apply
    public function jobApplyForm($id)
    {

        $job_id = Job::find($id);

        $recommendedJob = Job::where([
            ['occupation_id', $job_id->occupation_id],
            ['city_id', $job_id->city_id],
        ])->take(5)->get();

        return view('website.job.job-apply-form', compact('job_id', 'recommendedJob'));

    }
    // end here



    // save user jobs
    public function saveJobApplyForm(Request $request)
    {

        if (Auth::check()) {

            $checkJobApplied = DB::table('job_user')->where([
                ['user_id', Auth::id()],
                ['job_id', $request->job_id],
            ])->first();

            if ($checkJobApplied != null)
            {
                return response()->json(['error' => 'fail']);
            }
            else
            {
                DB::table('job_user')->insert([
                    'user_id' => Auth::id(),
                    'job_id' => $request->job_id,
                    'created_at'=>Carbon::now(),
                ]);
                return response()->json(['success' => 'success']);
            }
        }
        else
        {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'first_name' => 'required',
                'last_name' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'phone_number' => 'required',
                'password' => 'required',
            ]);

            $user = new User();
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->date_of_birth = $request->dob;
            $user->gender = $request->gender;
            $user->phone = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->save();

            $user_id = $user->id;

            DB::table('job_user')->insert([
                'user_id' => $user_id,
                'job_id' => $request->job_id,
                'created_at'=>Carbon::now(),
            ]);

            for ($i = 0; $i < count($request->recommendedJob); $i++)
            {
                $checkFirstJob=DB::table('job_user')->where([
                    ['user_id' , $user_id],
                    ['job_id'  , $request->recommendedJob[$i]],
                ])->first();

                if ($checkFirstJob != null){

                }
                else{

                    DB::table('job_user')->insert([
                        'user_id' => $user_id,
                        'job_id' => $request->recommendedJob[$i],
                        'created_at'=>Carbon::now(),
                    ]);
                }
            }

            Auth::loginUsingId($user_id);

            return redirect()->route('index');

        }

    }
    // end here

}
