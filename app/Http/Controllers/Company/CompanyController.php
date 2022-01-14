<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF;
use PDF;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function index()
    {
    	return view('website.company.dashboard');
    }


    public function simple_profile()
    {
    	$company = Auth::guard('company')->user();

    	return view('website.company.simple-profile.index' , compact('company'));
    }

    public function simple_profile_settings()
    {
        $company = Auth::guard('company')->user();

        return view('website.company.simple-profile.account-setting' , compact('company'));
    }

    public function edit_simple_profile()
    {
        $company = Auth::guard('company')->user();

        return view('website.company.simple-profile.edit' , compact('company'));
    }

    public function update_profile_settings(Request $request , $id)
    {
        $company = Company::findOrFail($id);
        $hashedPassword = $company->password;

        if(isset($request->password))
        {
            if($this->checkPassword($request->current_password, $hashedPassword)==true)
            {
                $company->password = Hash::make($request->password);
            }
            else
            {
                return redirect()->back()->with('error' , "Your current password is incorrect");
            }
        }

        if($request->is_active == "on")
        {
            $company->is_active= 1;
        }
        else
        {
            $company->is_active= 0;
        }

        $company->save();

        return redirect()->back()->with('success' , "Your settings has been updated Successfully");
    }

    public function checkPassword($current_password , $hashedPassword)
    {
        if (Hash::check($current_password , $hashedPassword))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update(Request $request , $id)
    {
        $company = Company::findOrFail($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->location = $request->location;
        $company->phone = $request->phone;
        $company->founded = $request->founded;
        $company->services = $request->services;
        $company->employees = $request->employees;
        $company->website_url = $request->website_url;
        $company->about = $request->about;

        if($request->has('logo'))
        {
            if(isset($company->logo)) {
                @unlink('storage/company_logo/' . $company->logo);
            }
            $image = $request->file('logo');
            $company_logo = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/company_logo');
            $image->move($destinationPath, $company_logo);
            $company->logo = $company_logo;

        }

        $company->save();
        return redirect()->back()->with('success' , "Your profile has been updated successfully");
    }

    public function jobApplicant(){

        $companyJobsApplicant=Job::where('company_id', Auth::id())->get();
    //   dd($companyJobsApplicant);
        return view('website.company.applicants.job-applicant',compact('companyJobsApplicant'));
    }

    public function jobApplicantCv($id){

        $applicantCV=User::with(['careerBackgrounds'],['qualifications'],['personalizedBackgrounds'])->find($id);

        $professionalSkills=json_decode($applicantCV->professional_skills);
        $explodeSkills=explode(',',$professionalSkills[0] ?? '');

        if (empty($explodeSkills)){
            $explodeSkills= array();
        }
        else{
            $explodeSkills;
        }

        return view('website.company.applicants.applicant-cv',compact('applicantCV','explodeSkills'));
    }

    public function cvPDF($id){

        $applicantCV=User::with(['careerBackgrounds'],['qualifications'],['personalizedBackgrounds'])->find($id);
        $professionalSkills=json_decode($applicantCV->professional_skills);
        $explodeSkills=explode(',',$professionalSkills[0] ?? '');

        if (empty($explodeSkills)){
            $explodeSkills= array();
        }
        else{
            $explodeSkills;
        }
        $pdf = PDF::loadView('website.company.applicants.cv-pdf',compact('applicantCV','explodeSkills'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('cv.pdf');
    }

    public function jobFilter($jobID=0 , $jobDate=0 , $jobContract=null, $jobSalary=0){


        if ($jobSalary != 0){


            $job=Job::where([ ['end_salary', $jobSalary] , ['company_id', Auth::id()] ])->get();
            return response()->json(['allSalaryJob' => $job]);

        }

        if ($jobID != 0){
            $job=DB::table('jobs')
                ->join('job_user','jobs.id','=','job_user.job_id')
                ->join('users','job_user.user_id','=','users.id')
                ->where([ ['jobs.company_id',Auth::id()] , ['jobs.id',$jobID] ])
                ->select('users.id','users.name','users.email','users.salary','users.video','job_user.created_at as applied_date',)
                ->get();
            return response()->json(['jobApplicant' => $job]);

        }
        if ($jobDate != 0){

            $job=Job::where([ ['posted_at', $jobDate] , ['company_id', Auth::id()] ])->get();
            return response()->json(['allDateJob' => $job]);

        }


        if ($jobContract != null){


            $job=Job::where([ ['type', $jobContract] , ['company_id', Auth::id()] ])->get();
            return response()->json(['allContractJob' => $job]);

        }





    }

    public function JobApplicants($id){
//        $jobApplicants=Job::with('users:id,name,email')->where([ ['id', $id] , ['company_id', Auth::id()] ])->first();
        $jobApplicants=DB::table('jobs')
            ->join('job_user','jobs.id','=','job_user.job_id')
            ->join('users','job_user.user_id','=','users.id')
            ->where([ ['jobs.company_id',Auth::id()] , ['jobs.id',$id] ])
            ->select('users.id','users.name','users.salary','users.video','job_user.created_at as applied_date')
            ->get();

        return view('website.company.applicants.filtered-job-applicant',compact('jobApplicants'));
    }

}
