<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rules\In;

class IndustryController extends Controller
{
    public function index()
    {
        $industry=Industry::get();
       
   
     return view('admin.industry.view',compact('industry'));

        
    }

    public function store(Request $request)
    {
        // validation in laravel
        $this->validate($request, [
            'name' => 'required|unique:industries|max:255',
           
        ]);

        

        // Store the data in industry...
    
        $industry = new Industry();

        $industry->name = $request->input('name');
    
        $industry->save();

        return redirect()->route('admin_industry_create')->with('success', "Industry has been added successfully");
    }

    public function create()
    {
        return view('admin.industry.create');
    }

    public function getIndustry(Request $request)
    {
        $result = Industry::orderBy('created_at', 'ASC');

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
                            <a href=\"editIndustry/{$aRow->id}\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteIndustry({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
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

    public function edit($id)
    {
        $industry = industry::findOrFail($id);
        return view('admin.industry.edit' , compact('industry'));
    }

    public function update(Request $request , $id)
    {
        $industry = Industry::findOrFail($id);

        $industry->name = $request->name;

        $industry->save();

        return redirect()->route('admin_industry_view')->with('success', "Industry has been updated Successfully");

    }

    public function delete($id)
    {
     
        
        $industry = Industry::find($id);
        $industry->delete();
        return redirect()->route('admin_industry_view')->with('success', "Industry has been deleted Successfully");

    }
}
