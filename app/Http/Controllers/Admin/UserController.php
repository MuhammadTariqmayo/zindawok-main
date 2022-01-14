<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\CareerBackground;
use App\Models\PersonalizedBackground;
use App\Models\Qualification;
use PDF;

class UserController extends Controller
{

  	public function index()
  	{
  		return view('admin.user.view');
  	}

    public function create()
    {
    	return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|unique:users'
        ]);

        if($request->has('image'))
        {
            $image = $request->file('image');
            $user_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_image');
            $image->move($destinationPath, $user_image);
        }
        if($request->has('video'))
        {
            $video = $request->file('video');
            $user_video = time().'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_video');
            $video->move($destinationPath, $user_video);
        }

    	$user = new User();

      	$user->name = $request->name;
      	$user->email = $request->email;
      	$user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->image = $user_image;
        $user->video = $user_video;
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
        for ( $i=0; $i<count($request->company); $i++ ) {

             $career_background = new CareerBackground();

             $career_background->company = $request->company[$i];
             $career_background->city = $request->city[$i];
             $career_background->start_date = $request->start_date[$i];
             $career_background->end_date = $request->end_date[$i];
             $career_background->job_title = $request->job_title[$i];
             $career_background->user_id = $user_id;

             $career_background->save();

        }

        for ( $i=0; $i<count($request->qualification); $i++ ) {

             $personalized_background = new PersonalizedBackground();

             $personalized_background->qualification = $request->qualification[$i];
             $personalized_background->institution = $request->institution[$i];
             $personalized_background->start_date = $request->institute_start_date[$i];
             $personalized_background->end_date = $request->end_date[$i];
             $personalized_background->institution_address = $request->job_title[$i];
             $personalized_background->user_id = $user_id;

             $personalized_background->save();

        }

        for ( $i=0; $i<count($request->school_city); $i++ ) {

             $qualification = new Qualification();

             $qualification->school_name = $request->school_name[$i];
             $qualification->school_city = $request->school_city[$i];
             $qualification->school_start_date = $request->school_start_date[$i];
             $qualification->school_end_date = $request->school_end_date[$i];
             $qualification->degree = $request->degree[$i];
             $qualification->user_id = $user_id;

             $qualification->save();

        }

    	return redirect()->route('admin.user.index')->with('success','User is Created Successfully');
    }

    public function getUsers(Request $request)
    {
        $result = User::orderBy('created_at', 'DESC');

        $aColumns = ['id','name','email','created_at'];

        $iStart = $request->get('iDisplayStart');
        $iPageSize = $request->get('iDisplayLength');

        $order = 'created_at';
        $sort = ' DESC';

        if ($request->get('iSortCol_0')) { //iSortingCols

            $sOrder = "ORDER BY  ";

            for ($i = 0; $i < intval($request->get('iSortingCols')); $i++) {
                if ($request->get('bSortable_' . intval($request->get('iSortCol_' . $i))) == "true") {
                    $sOrder .= $aColumns[intval($request->get('iSortCol_' . $i))] . " " . $request->get('sSortDir_' . $i) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                 $sOrder = " id ASC";
            }

            $OrderArray = explode(' ', $sOrder);
            $order = trim($OrderArray[3]);
            $sort = trim($OrderArray[4]);

        }

        $sKeywords = $request->get('sSearch');
        if ($sKeywords != "") {

            $result->Where(function($query) use ($sKeywords) {
                $query->orWhere('name', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('email', 'LIKE', "%{$sKeywords}%");
            });
        }

        for ($i = 0; $i < count($aColumns); $i++) {
            $request->get('sSearch_' . $i);
            if ($request->get('bSearchable_' . $i) == "true" && $request->get('sSearch_' . $i) != '') {
                 $result->orWhere($aColumns[$i], 'LIKE', "%" . $request->orWhere('sSearch_' . $i) . "%");
            }
        }

        $iFilteredTotal = $result->count();

        if ($iStart != null && $iPageSize != '-1') {
            $result->skip($iStart)->take($iPageSize);
        }

        $result->orderBy($order, trim($sort));
        $result->limit($request->get('iDisplayLength'));
        $linksData = $result->get();

        $iTotal = $iFilteredTotal;
        $output = array(
             "sEcho" => intval($request->get('sEcho')),
             "iTotalRecords" => $iTotal,
             "iTotalDisplayRecords" => $iFilteredTotal,
             "aaData" => array()
        );
        $i = 0;

        foreach ($linksData as $aRow) {

            $checkbox = "<label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                             <input type=\"checkbox\" class=\"checkbox-index\" value=\"{$aRow->id}\">
                             <span></span>
                          </label>";

            $name = $aRow->name;
            $email = $aRow->email;

            $action = "<span class=\"dropdown\">
                          <button id=\"btnSearchDrop2\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                          aria-expanded=\"false\" class=\"btn btn-info btn-sm dropdown-toggle\"><i class=\"la la-cog font-medium-1\"></i></button>
                          <span aria-labelledby=\"btnSearchDrop2\" class=\"dropdown-menu mt-1 dropdown-menu-right\">
                            <a href=\"editUser/{$aRow->id}\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteUser({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
                          </span>
                        </span>
                        ";
            $resume = "<a href=\"/admin/user/pdf/{$aRow->id}\" class=\"btn btn-primary\" target=\"_blank\"> Download CV</a>
                        ";

            $output['aaData'][] = array(
                "DT_RowId" => "row_{$aRow->id}",
                @$aRow->id,
                @$name,
                @$email,
                @$action,
                @$resume
            );

            $i++;
        }
        echo json_encode($output);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $professional_skills = json_decode($user->professional_skills);
        $interpersonal_skills = json_decode($user->interpersonal_skills);
        $careerBackgrounds = $user->careerBackgrounds;
        $personalizedBackgrounds = $user->personalizedBackgrounds;
        $qualifications = $user->qualifications;

        return view('admin.user.edit' , compact('user' ,'professional_skills', 'interpersonal_skills' , 'careerBackgrounds' , 'personalizedBackgrounds' , 'qualifications'));
    }

    public function update(Request $request , $id)
    {

        $user = User::findOrFail($id);

        if(isset($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->salary = $request->salary;
        $user->about = $request->about;
        $user->professional_skills = json_encode($request->professional_skills);
        $user->interpersonal_skills = json_encode($request->interpersonal_skills);
        $user->future_goals = $request->future_goals;
        $user->english_level = $request->english_level;
        $user->employment_status = $request->employment_status;
        $user->no_of_dependents = $request->no_of_dependents;
        $user->cnic = $request->cnic;

        if($request->has('image'))
        {
            $image = $request->file('image');
            $user_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_image');
            $image->move($destinationPath, $user_image);
            $user->image = $user_image;
        }


        if($request->has('video'))
        {
            $video = $request->file('video');
            $user_video = time().'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_video');
            $video->move($destinationPath, $user_video);
            $user->video = $user_video;
        }

        $user->save();
        if($request->company == null){

        }else{

        for($i=0; $i<count($request->company); $i++)
        {
            $career_background =  CareerBackground::findOrFail($request->company_id[$i]);

            $career_background->company = $request->company[$i];
            $career_background->city = $request->city[$i];
            $career_background->start_date = $request->start_date[$i];
            $career_background->end_date = $request->end_date[$i];
            $career_background->job_title = $request->job_title[$i];

            $career_background->save();

        }
    }

       if($request->qualification==null){

       }else{
        for($i=0; $i<count($request->qualification); $i++ )
        {
            $personalized_background =  PersonalizedBackground::findOrFail($request->qualification_id[$i]);

            $personalized_background->qualification = $request->qualification[$i];
            $personalized_background->institution = $request->institution[$i];
            $personalized_background->start_date = $request->institute_start_date[$i];
            $personalized_background->end_date = $request->end_date[$i];
            $personalized_background->institution_address = $request->job_title[$i];

            $personalized_background->save();
        }
    }
         if($request->school_city==null){

         }else{

        for ( $i=0; $i<count($request->school_city); $i++ )
        {
            $qualification =  Qualification::findOrFail($request->school_id[$i]);

            $qualification->school_name = $request->school_name[$i];
            $qualification->school_city = $request->school_city[$i];
            $qualification->school_start_date = $request->school_start_date[$i];
            $qualification->school_end_date = $request->school_end_date[$i];
            $qualification->degree = $request->degree[$i];

            $qualification->save();
        }
    }


        return redirect()->route('admin.user.index')->with('success','User is Updated Successfully');

    }

    public function createPDF($id) {

        $user = User::findOrFail($id);

        $professional_skills = json_decode($user->professional_skills);
        $interpersonal_skills = json_decode($user->interpersonal_skills);
        $careerBackgrounds = $user->careerBackgrounds;
        $personalizedBackgrounds = $user->personalizedBackgrounds;
        $qualifications = $user->qualifications;
        $pdf = PDF::loadView('admin/user/cv_pdf' , compact('user' ,'professional_skills', 'interpersonal_skills' , 'careerBackgrounds' , 'personalizedBackgrounds' , 'qualifications'))->setPaper('a4', 'landscape');
      return $pdf->stream('pdf_file.pdf');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}
