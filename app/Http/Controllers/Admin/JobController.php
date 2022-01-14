<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Shift;
use App\Models\Company;
use App\Models\City;
use App\Models\Industry;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.job.view');
    }

    public function create()
    {
        $companies = Company::all();
        $cities = City::all();
        $shifts = Shift::all();
        $industries = Industry::all();
        $salary= Salary::all();

        return view('admin.job.create' , compact('companies' , 'shifts' ,'cities' , 'industries','salary'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'required|mimes:mp4,mov,ogg,qt | max:20000',
        ]);

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

        $job->end_salary=$request->salary;


        $job->save();

        return redirect()->route('admin.job.index')->with('success', "Job has been added successfully");

    }

    public function getJobs(Request $request)
    {
        $result = DB::table('jobs')
                ->join('companies', 'jobs.company_id', '=', 'companies.id')
                ->join('shifts', 'jobs.shift_id', '=', 'shifts.id')
                ->select('jobs.*', 'companies.name as company', 'shifts.name as shift')
                ->orderBy('companies.created_at', 'ASC');

        $aColumns = ['id','image','company','title','start_salary','posted_at','welcome_bonus','created_at'];

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
                 $sOrder = "id ASC";
            }

            $OrderArray = explode(' ', $sOrder);
            $order = trim($OrderArray[3]);
            $sort = trim($OrderArray[4]);

        }

        $sKeywords = $request->get('sSearch');
        if ($sKeywords != "") {

            $result->Where(function($query) use ($sKeywords) {
                $query->orWhere('title', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('companies.name', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('start_salary', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('end_salary', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('posted_at', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('welcome_bonus', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('shifts.name', 'LIKE', "%{$sKeywords}%");
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

            $title = $aRow->title;
            $company = $aRow->company;
            $image =    "<span class=\"dropdown\">
                          <img src =\"/storage/job_image/{$aRow->image}\" alt =\"$aRow->image\"
                          height = \"50px\" width = \"50px\" \>
                        </span>
                        ";
            $salary =  $aRow->start_salary ."-". $aRow->end_salary;
            $posted_at = $aRow->posted_at;
            $bonus = $aRow->welcome_bonus;
            $shift = $aRow->shift;

            $action = "<span class=\"dropdown\">
                          <button id=\"btnSearchDrop2\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                          aria-expanded=\"false\" class=\"btn btn-info btn-sm dropdown-toggle\"><i class=\"la la-cog font-medium-1\"></i></button>
                          <span aria-labelledby=\"btnSearchDrop2\" class=\"dropdown-menu mt-1 dropdown-menu-right\">
                            <a href=\"job/edit/{$aRow->id}\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteJob({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
                          </span>
                        </span>
                        ";

            $output['aaData'][] = array(
                "DT_RowId" => "row_{$aRow->id}",
                @$aRow->id,
                @$image,
                @$company,
                @$title,
                @$salary,
                @$posted_at,
                @$bonus,
                @$shift,
                @$action
            );

            $i++;
        }
        echo json_encode($output);
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);

        $companies = Company::all();
        $cities = City::all();
        $shifts = Shift::all();
        $industries = Industry::all();
        $salary=Salary::all();

        return view('admin.job.edit' , compact('job' ,'companies', 'cities','shifts','industries','salary'));
    }

    public function update(Request $request , $id)
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

        $job->end_salary=$request->salary;

        $job->save();

        return redirect()->route('admin.job.index')->with('success', "Job has been updated  successfully");
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json(['status' => 'success']);
    }


}
