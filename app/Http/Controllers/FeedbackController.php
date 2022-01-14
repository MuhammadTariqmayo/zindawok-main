<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedBack;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function companyFeedback()
    {
        $feedback=feedBack::where('actor','company')->get();

       return view('admin.feedback.company-feedback',compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userFeedback()
    {
        $feedback=feedBack::where('actor','user')->get();

        return view('admin.feedback.user-feedback',compact('feedback'));
    }
    public function companyDestroy($id)
    {
        $feed=feedBack::find($id);
        $feed->delete();
        return redirect()->back();
    }
    public function userDestroy($id)
    {
        $feed=feedBack::find($id);
        $feed->delete();
        return redirect()->back();
    }

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

}
