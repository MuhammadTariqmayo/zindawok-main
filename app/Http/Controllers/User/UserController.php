<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookMark;
use App\Models\CareerBackground;
use App\Models\PersonalizedBackground;
use App\Models\Qualification;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDF;

class UserController extends Controller
{
    public function index()
    {
        return view('website.user.dashboard');
    }

    public function simple_profile()
    {
    	return view('website.user.simple-profile.index');
    }

    public function detail_profile()
    {
        $user = Auth::user();


        $professional_skills = json_decode($user->professional_skills);
        if(empty(json_decode($user->interpersonal_skills))){
            $interpersonal_skills = array();
        }else{
            $interpersonal_skills = json_decode($user->interpersonal_skills);
        }

        if(empty(json_decode($user->professional_skills))){
            $professional_skills = array();
        }else{
            $professional_skills = json_decode($user->professional_skills);
        }

        $careerBackgrounds = $user->careerBackgrounds;
        $personalizedBackgrounds = $user->personalizedBackgrounds;
        $qualifications = $user->qualifications;

        return view('website.user.detail-profile.index' , compact('user' , 'careerBackgrounds' , 'professional_skills' , 'interpersonal_skills' ,'personalizedBackgrounds' , 'qualifications'));
    }

    public function edit_simple_profile()
    {
        $user = Auth::user();

    	return view('website.user.simple-profile.edit' , compact('user'));
    }

    public function simple_profile_settings()
    {
        $user = Auth::user();

        return view('website.user.simple-profile.account-setting' , compact('user'));
    }

    public function store_detail_profile(Request $request)
    {
//        $request->validate([
//            'email' => 'required|string|unique:users'
//        ]);

//        if($request->has('image'))
//        {
//            $image = $request->file('image');
//            $user_image = time().'.'.$image->getClientOriginalExtension();
//            $destinationPath = public_path('/storage/user_image');
//            $image->move($destinationPath, $user_image);
//        }
        if($request->has('video'))
        {
            $video = $request->file('video');
            $user_video = time().'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_video');
            $video->move($destinationPath, $user_video);
        }
        else{
            $user_video=null;
        }

        $user =User::find(Auth::id());

        $user->video = $user_video;
        $user->name = auth()->user()->name;
        $user->email = auth()->user()->email;
        $user->password=auth()->user()->password;
//        $user->password = Hash::make($request->password);
//        $user->gender = $request->gender;
//        $user->date_of_birth = $request->date_of_birth;
//        $user->phone = $request->phone;
//        $user->location = $request->location;
//        $user->image = $user_image;
        $user->salary = $request->salary;
        $user->about = $request->about;
        $user->professional_skills = json_encode($request->professional_skills);
        $user->interpersonal_skills = json_encode($request->interpersonal_skills);
        $user->future_goals = $request->future_goals;
        $user->english_level = $request->english_level;
        $user->employment_status = $request->employment_status;
        $user->no_of_dependents = $request->no_of_dependents;
        $user->cnic = $request->cnic;

        $user->save();


        $user_id = $user->id;

//        add and update career background here
                for ( $i=0; $i<count($request->company); $i++ ) {

                    $update_career_background=CareerBackground::find($request->career_background_id[$i] ?? '');

                    if (empty($update_career_background)){

                        $career_background = new CareerBackground();
                        $career_background->company = $request->company[$i];
                        $career_background->city = $request->city[$i];
                        $career_background->start_date = $request->start_date[$i];
                        $career_background->end_date = $request->end_date[$i];
                        $career_background->job_title = $request->job_title[$i];
                        $career_background->user_id = $user_id;
                        $career_background->save();

                    }
                    else{

                        $update_career_background->company = $request->company[$i];
                        $update_career_background->city = $request->city[$i];
                        $update_career_background->start_date = $request->start_date[$i];
                        $update_career_background->end_date = $request->end_date[$i];
                        $update_career_background->job_title = $request->job_title[$i];
                        $update_career_background->user_id = $user_id;
                        $update_career_background->save();

                    }
                }
//              end here

//        add and update qualification here
                for ( $i=0; $i<count($request->school_city); $i++ ) {

                    $update_qualification=Qualification::find($request->qualification_id[$i] ?? '');

                    if (empty($update_qualification)){

                        $qualifications = new Qualification();
                        $qualifications->school_name = $request->school_name[$i];
                        $qualifications->school_city = $request->school_city[$i];
                        $qualifications->school_start_date = $request->school_start_date[$i];
                        $qualifications->school_end_date = $request->school_end_date[$i];
                        $qualifications->degree = $request->degree[$i];
                        $qualifications->user_id = $user_id;
                        $qualifications->save();

                    }
                    else{

                        $update_qualification->school_name = $request->school_name[$i];
                        $update_qualification->school_city = $request->school_city[$i];
                        $update_qualification->school_start_date = $request->school_start_date[$i];
                        $update_qualification->school_end_date = $request->school_end_date[$i];
                        $update_qualification->degree = $request->degree[$i];
                        $update_qualification->user_id = $user_id;
                        $update_qualification->save();

                    }
                }
//              end here



//            add and update personalized background here

                for ( $i=0; $i<count($request->qualification); $i++ ) {

                    $update_personalized_background = PersonalizedBackground::find($request->personalized_id[$i] ?? '' );

                    if (empty($update_personalized_background)){

                        $new_personalized_background = new  PersonalizedBackground();
                        $new_personalized_background->qualification = $request->qualification[$i];
                        $new_personalized_background->institution = $request->institution[$i];
                        $new_personalized_background->start_date = $request->institution_start_date[$i];
                        $new_personalized_background->end_date = $request->institution_end_date[$i];
                        $new_personalized_background->institution_address = $request->institution_address[$i];
                        $new_personalized_background->user_id = $user_id;
                        $new_personalized_background->save();

                    }
                    else {

                        $update_personalized_background->qualification = $request->qualification[$i];
                        $update_personalized_background->institution = $request->institution[$i];
                        $update_personalized_background->start_date = $request->institution_start_date[$i];
                        $update_personalized_background->end_date = $request->institution_end_date[$i];
                        $update_personalized_background->institution_address = $request->institution_address[$i];
                        $update_personalized_background->user_id = $user_id;
                        $update_personalized_background->save();

                    }
                }
//              end here

        return redirect()->back();

//        return redirect()->route('admin.user.index')->with('success','User is Created Successfully');

    }

    public function update_simple_profile(Request $request , $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->location = $request->location;

        if($request->has('image'))
        {
            if(isset($user->image)) {
                @unlink('storage/user_image/' . $user->image);
            }
            $image = $request->file('image');
            $user_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_image');
            $image->move($destinationPath, $user_image);
            $user->image = $user_image;

        }

        $user->save();

        return redirect()->route('user.simple.profile')->with('success' , "Simple Profile Updated Successfully");
    }

    public function resume()
    {
        $id=Auth::user()->id;
        $user = User::findOrFail($id);

        $professionalSkills = json_decode($user->professional_skills);
        $profSkills = explode(",", $professionalSkills[0]);
        $interpersonalSkills = json_decode($user->interpersonal_skills);
        $intpersonalSkills = explode(",", $interpersonalSkills[0]);

        return view('website.user.resume.index' , compact('profSkills' , 'intpersonalSkills'));

    }
    public function userCvPdf()
    {
        $id=Auth::user()->id;
        $user = User::findOrFail($id);

        $professional_skills = json_decode($user->professional_skills);
        $interpersonal_skills = json_decode($user->interpersonal_skills);
        $careerBackgrounds = $user->careerBackgrounds;
        $personalizedBackgrounds = $user->personalizedBackgrounds;
        $qualifications = $user->qualifications;
        $pdf = PDF::loadView('website.user.resume.resume-pdf' , compact('user' ,'professional_skills', 'interpersonal_skills' , 'careerBackgrounds' , 'personalizedBackgrounds' , 'qualifications'))->setPaper('a4', 'landscape');
        return $pdf->stream('pdf_file.pdf');

        
    }

    public function update_profile_settings(Request $request , $id)
    {
        $user = User::findOrFail($id);
        $hashedPassword = $user->password;

        if(isset($request->password))
        {
            if($this->checkPassword($request->current_password, $hashedPassword)==true)
            {
                $user->password = Hash::make($request->password);
            }
            else
            {
                return redirect()->back()->with('error' , "Your current password is incorrect");
            }
        }

        if($request->is_active == "on")
        {
            $user->is_active= 1;
        }
        else
        {
            $user->is_active= 0;
        }

        $user->save();

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


    // job bookmark function
    public function bookMark(Request $request){

        $checkStatus=BookMark::where([
           ['job_id',$request->job_id],
           ['user_id',Auth::id()],
        ])->first();

        if ($checkStatus != null){
            return response()->json(['error'=>'fail']);
        }
        else{
            $bookMark=new BookMark();
            $bookMark->user_id=Auth::id();
            $bookMark->job_id=$request->job_id;
            $bookMark->bookmark_status=1;
            $bookMark->save();
            return response()->json(['success'=>'success']);

        }

    }
    //end here


    // get bookmark jobs
    public function bookMarkJobs(){
        $user=User::find(Auth::id());
        $userBookmark=$user->bookMarks;
        return view('website.user.bookmark.user-bookmark-job',compact('userBookmark'));
    }
    // end here


    // delete bookmark
    public function deleteBookmark($id){
        $userBookmarkJob=BookMark::where([
            ['user_id',Auth::id()],
            ['job_id',$id],
        ])->first();
       $userBookmarkJob->delete();
       return response()->json(['error'=>'fail']);

    }
    // end here


    // submitted jobs , job history , bookmark
    public function submitJobAppliedList(){
        $submitJobs=User::find(Auth::id());
        return view('website.job.submit-job-applied-list',compact('submitJobs'));
    }
    // end here


}
