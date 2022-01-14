<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Shift;
use App\Models\Industry;
use App\Models\Occupation;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpParser\Node\Stmt\ElseIf_;

class JobController extends Controller
{
    public function create()
    {

    	$cities = City::all();
    	$shifts = Shift::all();
    	$industries = Industry::all();
    	return view('website.job.create' , compact('cities', 'shifts' , 'industries'));
    }

    public function index()
    {
        $company_id = Auth::guard('company')->user()->id;

        $jobs = DB::table('jobs')
                ->join('companies', 'jobs.company_id', '=', 'companies.id')
                ->join('shifts', 'jobs.shift_id', '=', 'shifts.id')
                ->select('jobs.*', 'companies.name as company', 'shifts.name as shift')
                ->where('jobs.company_id' , '=' , $company_id)
                ->get();

        return view('website.job.listing' , compact('jobs'));
    }

    public function store(Request $request)
    {

        $jobs=Job::where('company_id', Auth::guard('company')->user()->id)->get();
        // return $jobs->isEmpty();

        if($jobs->isEmpty() != 1 ||$jobs->isEmpty() == 1)
        {
            foreach($jobs as $job) {
                $job->delete();
            }

        }else

        {
    	    $job = new Job();

            $job->company_id = $request->company_id;
            $job->city_id = $request->city_id;
            $job->industry_id = $request->industry_id;
            $job->title = $request->title;
            $job->shift_id = $request->shift_id;
            $job->occupation_id =  $request->occupation_id;
            $job->sub_occupation_id = $request->sub_occupation_id;
            $job->welcome_bonus = $request->welcome_bonus;
            $job->posted_at = $request->posted_at;
            $job->expired_at = $request->expired_at;
            $job->about = $request->about;
            $job->type = $request->type;
            if($request->has('image'))
            {
                $image = $request->file('image');
                $job_image = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/job_image');
                $image->move($destinationPath, $job_image);
                $job->image = $job_image;
            }
            if($request->has('video'))
            {
                $video = $request->file('video');
                $job_video = time().'.'.$video->getClientOriginalExtension();
                $destinationPath = public_path('/storage/job_video');
                $video->move($destinationPath, $job_video);
                $job->video = $job_video;
            }

            if(isset($request->salary))
            {
                if($request->salary == "20000")
                {
                    $job->start_salary = 1;
                    $job->end_salary = 20000;
                }
                if($request->salary == "40000")
                {
                    $job->start_salary = 20000;
                    $job->end_salary = 40000;
                }
                if($request->salary == "60000")
                {
                    $job->start_salary = 40000;
                    $job->end_salary = 60000;
                }
                if($request->salary == "80000")
                {
                    $job->start_salary = 60000;
                    $job->end_salary = 80000;
                }
                if($request->salary == "100000")
                {
                    $job->start_salary = 80000;
                    $job->end_salary = 100000;
                }
                if($request->salary == "150000")
                {
                    $job->start_salary = 100000;
                    $job->end_salary = 150000;
                }
                if($request->salary == "200000")
                {
                    $job->start_salary = 150000;
                    $job->end_salary = 250000;
                }

            }

            $job->save();

        return redirect()->route('company.job.index')->with('success' , 'Job has been posted successfully');

    }
    }
    public function getOccupations($id)
    {
    	$occupations= Occupation::select('id', 'name')
    							->where('industry_id', $id)
    							->whereNULL('parent_id')
    							->get()
    							->toArray();
    	return response()->json(['status' => 'success' , 'occupations' => $occupations]);
    }

    public function getSubOccupations($id)
    {
    	$occupations= Occupation::select('id', 'name')
    							->where('parent_id' , $id)
    							->get()
    							->toArray();
    	return response()->json(['status' => 'success' , 'occupations' => $occupations]);
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);


        $job->delete();

        return redirect()->route('company.job.index')->with('success' , 'Job has been deleted successfully');
    }

    public function detail($id)
    {
        $job = Job::join('companies', 'jobs.company_id', '=', 'companies.id')
                ->join('shifts', 'jobs.shift_id', '=', 'shifts.id')
                ->select('jobs.*', 'companies.name as company','companies.location as address' , 'shifts.name as shift' , 'shifts.start_time as start_time' , 'shifts.end_time as end_time')
                ->where('jobs.id' , '=' , $id)
                ->first();

        return view('website.job.detail' , compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);

        $cities = City::all();
        $shifts = Shift::all();
        $industries = Industry::all();

        return view('website.job.edit', compact('cities', 'shifts' , 'industries' ,'job'));
    }

    public function update(Request $request ,$id)
    {
        $job = Job::findOrFail($id);

        $job->company_id = $request->company_id;
        $job->city_id = $request->city_id;
        $job->industry_id = $request->industry_id;
        $job->title = $request->title;
        $job->shift_id = $request->shift_id;
        $job->occupation_id =  $request->occupation_id;
        $job->sub_occupation_id = $request->sub_occupation_id;
        $job->welcome_bonus = $request->welcome_bonus;
        $job->posted_at = $request->posted_at;
        $job->expired_at = $request->expired_at;
        $job->about = $request->about;
        $job->type = $request->type;

        if($request->has('image'))
        {
            if(isset($job->image)) {
                @unlink('storage/job_image/' . $job->image);
            }
            $image = $request->file('image');
            $job_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/job_image');
            $image->move($destinationPath, $job_image);
            $job->image = $job_image;

        }

        if($request->has('video'))
        {
            if(isset($job->image)) {
                @unlink('storage/job_video/' . $job->video);
            }
            $video = $request->file('video');
            $job_video = time().'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path('/storage/job_video');
            $video->move($destinationPath, $job_video);
            $job->video = $job_video;
        }


        if(isset($request->salary))
        {
            if($request->salary == "20000")
            {
                $job->start_salary = 1;
                $job->end_salary = 20000;
            }
            if($request->salary == "40000")
            {
                $job->start_salary = 20000;
                $job->end_salary = 40000;
            }
            if($request->salary == "60000")
            {
                $job->start_salary = 40000;
                $job->end_salary = 60000;
            }
            if($request->salary == "80000")
            {
                $job->start_salary = 60000;
                $job->end_salary = 80000;
            }
            if($request->salary == "100000")
            {
                $job->start_salary = 80000;
                $job->end_salary = 100000;
            }
            if($request->salary == "150000")
            {
                $job->start_salary = 100000;
                $job->end_salary = 150000;
            }
            if($request->salary == "200000")
            {
                $job->start_salary = 150000;
                $job->end_salary = 250000;
            }
        }

        $job->save();

        return redirect()->route('company.job.index')->with('success' , 'Job has been updated successfully');
    }
}
