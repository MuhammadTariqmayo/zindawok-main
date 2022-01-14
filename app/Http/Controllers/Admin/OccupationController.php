<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Occupation;
use Illuminate\Http\Request;
use DB;

class OccupationController extends Controller
{


    public function index()
    {

        return view('admin.occupation.view');
    }

    public function subOccupation()
    {
        return view('admin.sub_occupation.view');
    }

    public function create()
    {
        $industry=Industry::get();

        return view('admin.occupation.create',compact('industry'));
    }

    public function create_subOccupation()
    {
        $occupations = Occupation::whereNull('parent_id')->get();
        return view('admin.sub_occupation.create', compact('occupations'));
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'name' => 'required|unique:occupations|max:255',


        ]);


        $occupation = new Occupation();
        $occupation->name = $request->input('name');
        $occupation->industry_id = $request->industry;
        $occupation->save();

        return redirect()->route('admin.occupation.index')->with('success', "Occupation has been added successfully");
    }

    public function store_subOccupation(Request $request)
    {
        //validation
        $this->validate($request,[
            'name' => 'required|unique:occupations|max:255',


        ]);
        //end validation

        $occupation = new Occupation();

        $occupation->name = $request->name;
        $occupation->parent_id = $request->parent_id;

        $occupation->save();

        return redirect()->route('admin.suboccupation.index')->with('success', "Sub Occupation has been added successfully");
    }


    public function getOccupations(Request $request)
    {
        $result = Occupation::whereNull('parent_id')->orderBy('created_at', 'DESC');

        $aColumns = ['id','name','created_at'];

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

            $action = "<span class=\"dropdown\">
                          <button id=\"btnSearchDrop2\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                          aria-expanded=\"false\" class=\"btn btn-info btn-sm dropdown-toggle\"><i class=\"la la-cog font-medium-1\"></i></button>
                          <span aria-labelledby=\"btnSearchDrop2\" class=\"dropdown-menu mt-1 dropdown-menu-right\">
                            <a href=\"editOccupation/{$aRow->id}\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteOccupation({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
                          </span>
                        </span>
                        ";

            $output['aaData'][] = array(
                "DT_RowId" => "row_{$aRow->id}",
                @$aRow->id,
                @$name,
                @$action
            );

            $i++;
        }
        echo json_encode($output);
    }

    public function getSubOccupations(Request $request)
    {
        $result = Occupation::where('parent_id', '!=', NULL);

        $aColumns = ['id','name','created_at'];

        $iStart = $request->get('iDisplayStart');
        $iPageSize = $request->get('iDisplayLength');

        $order = 'created_at'; // orderBy yaha hay
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
        $linksData = $result->get(); // this is get()

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
            $parent = $aRow->parent->name;

            $action = "<span class=\"dropdown\">
                          <button id=\"btnSearchDrop2\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                          aria-expanded=\"false\" class=\"btn btn-info btn-sm dropdown-toggle\"><i class=\"la la-cog font-medium-1\"></i></button>
                          <span aria-labelledby=\"btnSearchDrop2\" class=\"dropdown-menu mt-1 dropdown-menu-right\">
                            <a href=\"suboccupation/{$aRow->id}\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteOccupation({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
                          </span>
                        </span>
                        ";

            $output['aaData'][] = array(
                "DT_RowId" => "row_{$aRow->id}",
                @$aRow->id,
                @$name,
                @$parent,
                @$action
            );
            $i++;
        }
        echo json_encode($output);
    }
    public function editsuboccuption($id)
    {

        $subOccupation= Occupation::findOrFail($id);
        $occupations = Occupation::whereNull('parent_id')->orderBy('created_at', 'DESC')->get();


        return view('admin.sub_occupation.edit' , compact('subOccupation','occupations'));
    }
    public function updatesuboccuption(Request $request , $id)
    {
        // dd($request);
        $occupation = Occupation::findOrFail($id);

        $occupation->name = $request->name;
        $occupation->parent_id = $request->parent_id ;
        $occupation->save();
        return redirect()->route('admin.suboccupation.index')->with('success', "suboccupation has been updated Successfully");

    }

    public function edit($id)
    {
        $industry=Industry::all();
        $occupation = Occupation::findOrFail($id);
        return view('admin\occupation\edit' , compact('occupation','industry'));
    }

    public function update(Request $request , $id)
    {


        $occupation = Occupation::findOrFail($id);

        $occupation->name = $request->name;
        $occupation->industry_id = $request->industry;


        $occupation->save();

        return redirect()->route('admin.occupation.index')->with('success', "Occupation has been updated Successfully");
    }

    public function delete($id)
    {
        $occupation = Occupation::findOrFail($id);
        $occupation->delete();
        return response()->json(['status' => 'success']);
    }
}
