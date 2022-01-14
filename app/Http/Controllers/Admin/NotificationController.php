<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Jobs\SendallJob;
use App\Jobs\SendCompanyJob;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Mail\UserNotification;
use App\Mail\CompanyNotification;
use App\Mail\AllNotification;
use App\Models\UserNotifications;
use App\Models\CompanyNotifications;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function userEmails()
    {
        return view('admin.notification.mail_user_view');
    }

    public function companyEmails()
    {
        return view('admin.notification.mail_company_view');
    }

    public function createAllEmail()
    {
        return view('admin.notification.mail_all');
    }

    public function createUserEmail(){

    	$users = User::all();
    	return view('admin.notification.mail_user' , compact('users'));
    }

    public function createCompanyEmail()
    {
        $companies = Company::all();
        return view('admin.notification.mail_company' , compact('companies'));
    }

    public function sendEmailToUser(Request $request)
    {
        // dd($request->file('image'));
    	if($request->has('image'))
        {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $logo = time().'.'.$ext;
            $destinationPath = public_path('/storage/admin_user_email');
            $image->move($destinationPath, $logo);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'logo' => $logo,
            'ext' => $ext
        ];
        // return $data;

        $response = $this->generateEmailForUser($data);

        // return $response;
        if($response == true) {

            $user_notification = new UserNotifications();

            $user_notification->title = $request->title;
            $user_notification->description = $request->description;
            $user_notification->image = $logo;

            $user_notification->save();

            return redirect()->route('admin.user_email.index')->with('success','Email sent successfully.');

        } else {
            return redirect()->route('admin.user_email.index')->with('error','Email couldnt be send, plz try again');
        }
    }

    public function sendEmailToCompany(Request $request)
    {

        if($request->has('image'))
        {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $logo = time().'.'.$ext;
            $destinationPath = public_path('/storage/admin_company_email');
            $image->move($destinationPath, $logo);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'logo' => $logo,
            'ext' => $ext
        ];

        $response = $this->generateEmailForCompany($data);
        if($response == true) {

            $company_notification = new CompanyNotifications();

            $company_notification->title = $request->title;
            $company_notification->description = $request->description;
            $company_notification->image = $logo;

            $company_notification->save();

            return redirect()->route('admin.company_email.index')->with('success','Email sent successfully.');

        } else {
            return redirect()->route('admin.company_email.index')->with('error','Email couldnt be send, plz try again');
        }
    }

    public function sendEmailToAll(Request $request)
    {
        if($request->has('image'))
        {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $logo = time().'.'.$ext;
            $destinationPath = public_path('/storage/admin_all_email');
            $image->move($destinationPath, $logo);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'logo' => $logo,
            'ext' => $ext
        ];

    //    $company_response = $this->generateEmailForCompany($data);
    //    $user_response = $this->generateEmailForUser($data);
        // i think, aik query likhni ho gi, jo dono user or companies ka data utha ker lay
        $allUser = $this->generateEmailToAll($data);

        if($allUser == true) {

            return redirect()->back()->with('success','Email sent successfully.');

        } else {
            return redirect()->back()->with('error','Email couldnt be send, plz try again');
        }

    }

    public function generateEmailToAll($data)
    {

        $objData = new \stdClass();

        $objData->title = $data['title'];
        $objData->description = $data['description'];
        $objData->logo = $data['logo'];
        $objData->ext = $data['ext'];

        $users = DB::table('users')
                    ->select('name', 'email');

        $companies = DB::table('companies')
                        ->select('name', 'email')
                        ->union($users)
                        ->get();


        try {

            foreach ($companies as $company) {


                SendallJob::dispatch($company->email,$objData ,$company->name)->delay(now()->addSecond(20));
            }


            return true;

        } catch(\Exception $e) {
            return false;
        }
    }

    public function generateEmailForCompany($data)
    {
        $objCompany = new \stdClass();

        $objCompany->title = $data['title'];
        $objCompany->description = $data['description'];
        $objCompany->logo = $data['logo'];
        $objCompany->ext = $data['ext'];

        $companies = Company::all();

        try {
                foreach ($companies as $company) {

                SendCompanyJob::dispatch($company->email,$objCompany,$company->name)->delay(now()->addSecond(20));


            }
            return true;
        } catch(\Exception $e) {
                return false;
        }
    }
    public function generateEmailForUser($data)
    {
        $objUser = new \stdClass();
        $objUser->title = $data['title'];
        $objUser->description = $data['description'];
        $objUser->logo = $data['logo'];
        $objUser->ext = $data['ext'];
        $users = User::all();
        try {
            foreach ($users as $user) {
                // dd($user->email);

                SendEmailJob::dispatch($user->email,$objUser,$user->name)->delay(now()->addSecond(20));
            }
            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

    public function getCompanyEmails(Request $request)
    {
        $result = CompanyNotifications::orderBy('created_at', 'DESC');

        $aColumns = ['id','title','description','created_at'];

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
                $query->orWhere('title', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('description', 'LIKE', "%{$sKeywords}%");
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
            $description = $aRow->description;

            $action = "<span class=\"dropdown\">
                          <img src =\"/storage/admin_company_email/{$aRow->image}\" alt =\"$aRow->image\"
                          height = \"50px\" width = \"50px\" \>
                        </span>
                        ";

            $action1 = "<span class=\"dropdown\">
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
                @$title,
                @$description,
                @$action
            );

            $i++;
        }
        echo json_encode($output);
    }

    public function getUserEmails(Request $request)
    {
        $result = UserNotifications::orderBy('created_at', 'DESC');

        $aColumns = ['id','title','description','created_at'];

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
                $query->orWhere('title', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('description', 'LIKE', "%{$sKeywords}%");
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
            $description = $aRow->description;

            $action = "<span class=\"dropdown\">
                          <img src =\"/storage/admin_user_email/{$aRow->image}\" alt =\"$aRow->image\"
                          height = \"50px\" width = \"50px\" \>
                        </span>
                        ";

            $action1 = "<span class=\"dropdown\">
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
                @$title,
                @$description,
                @$action
            );

            $i++;
        }
        echo json_encode($output);
    }
}
