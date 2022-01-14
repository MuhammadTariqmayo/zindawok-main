<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index()
    {
        return view('admin.company.view');
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->has('logo'))
        {
            $image = $request->file('logo');
            $logo = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/company_logo');
            $image->move($destinationPath, $logo);
        }
        if($request->has('cover'))
        {
            $image = $request->file('cover');
            $cover = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/company_cover');
            $image->move($destinationPath, $cover);
        }

        $company = new Company();

        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = Hash::make($request->password);
        $company->location = $request->location;
        $company->phone = $request->phone;
        $company->founded = $request->founded;
        $company->services = $request->services;
        $company->employees = $request->employees;
        $company->website_url = $request->website_url;
        $company->logo = $logo;
        $company->cover = $cover;
        $company->about = $request->about;
        $company->is_active = 1;

        $company->save();

        return redirect()->route('admin.company.index')->with('success','Company has been Created Successfully');
    }

    public function getCompanies(Request $request)
    {
        $result = Company::orderBy('created_at', 'DESC');

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
                            <a href=\"editCompany/{$aRow->id}\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteCompany({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
                          </span>
                        </span>
                        ";
 
            $output['aaData'][] = array(
                "DT_RowId" => "row_{$aRow->id}",
                @$aRow->id,
                @$name,
                @$email,
                @$action
            );  

            $i++;
        }
        echo json_encode($output);           
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.company.edit' , compact('company'));
    }

    public function update(Request $request , $id)
    {
        $company = Company::findOrFail($id);

        if($request->status == "on")
        {
            $company->is_active = 1;
        }
        else{
            $company->is_active = 0;
        }
        if($request->has('logo'))
        {
            $image = $request->file('logo');
            $logo = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/company_logo');
            $image->move($destinationPath, $logo);
            $company->logo = $logo;

        }
        if($request->has('cover'))
        {
            $image = $request->file('cover');
            $cover = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/company_cover');
            $image->move($destinationPath, $cover);
            $company->cover = $cover;
        }
        if($request->password == null)
        {
            $company->name = $request->name;
            $company->email = $request->email;
            $company->location = $request->location;
            $company->phone = $request->phone;
            $company->founded = $request->founded;
            $company->services = $request->services;
            $company->employees = $request->employees;
            $company->website_url = $request->website_url;
            $company->about = $request->about;
        }
        else
        {
            $company->name = $request->name;
            $company->email = $request->email;
            $company->password = Hash::make($request->password);
            $company->location = $request->location;
            $company->phone = $request->phone;
            $company->founded = $request->founded;
            $company->services = $request->services;
            $company->employees = $request->employees;
            $company->website_url = $request->website_url;
            $company->about = $request->about;
        }


        $company->save();

        return redirect()->route('admin.company.index')->with('success','Company is Updated Successfully');

    }
    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(['status' => 'success']);
    }
}
