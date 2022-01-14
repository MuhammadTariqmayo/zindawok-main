<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\ScoutMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScouitMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //scoutmail
    public function index()
    {


       return view('website.company.scout-mail.scoutmail-job');
     
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function jobFilter( $jobID=0 ){


    //     if ($jobSalary != 0){


    //         $job=Job::where([ ['end_salary', $jobSalary] , ['company_id', Auth::id()] ])->get();
    //         return response()->json(['allSalaryJob' => $job]);

    //     }

    //     if ($jobID != 0){
    //         // dd($jobID);
    //         $job=DB::table('jobs')
    //             ->join('job_user','jobs.id','=','job_user.job_id')
    //             ->join('users','job_user.user_id','=','users.id')
    //             ->where([ ['jobs.company_id',Auth::id()] , ['jobs.id',$jobID] ])
    //             ->select('users.id','users.name','users.email','users.salary','users.video','job_user.created_at as applied_date',)
    //             ->get();
    //         return response()->json(['jobApplicant' => $job]);

    //     }

    //     if ($jobDate != 0){

    //         $job=Job::where([ ['posted_at', $jobDate] , ['company_id', Auth::id()] ])->get();
    //         return response()->json(['allDateJob' => $job]);

    //     }


    //     if ($jobContract != null){


    //         $job=Job::where([ ['type', $jobContract] , ['company_id', Auth::id()] ])->get();
    //         return response()->json(['allContractJob' => $job]);

    //     }
    // }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
