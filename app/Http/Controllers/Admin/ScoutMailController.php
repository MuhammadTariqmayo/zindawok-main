<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScoutMail;
use Illuminate\Http\Request;
use App\Models\ScoutMailPackage;

class ScoutMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.scout-mail.scouitmail');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
       $scout=ScoutMail::find($id);
       if($scout->status == 'pending'){
            $scout->status='approved';
            $scout->update();
            return redirect()->back();
       }else{
          $scout->status == 'disapproved';
          $scout->status = 'aproved';
             $scout->update();
             return redirect()->back();
       }


    }
    public function disaprove($id)
    {
        $scout=ScoutMail::find($id);
        if($scout->status   == 'aproved'){
             $scout->status =  'disapproved';
             $scout->update();
             return redirect()->back();

        }else{
            $scout->status == 'aproved';
            $scout->status= 'disapproved';
               $scout->update();
               return redirect()->back();
         }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        return view('admin.scoutmail-package.create');
    }
    public function create(Request $request)
    {
        // dd($request->all());
        // validation in laravel
        // $this->validate($request, [
        //     'start_salary' => 'required|unique:salaries|max:255',
        //     'end_salary' => 'required|unique:salaries|max:255',

        // ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = public_path('image/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        ScoutMailPackage::create($input);
        return redirect()->route('scouitmail-package.view')
        ->with('success','Package Create successfully');

    }

    public function packageview(Request $request)
    {
        $package=ScoutMailPackage::all();
        return view('admin.scoutmail-package.view',compact('package'));
    }

    public function packageedit($id)
    {
        $packageedit = ScoutMailPackage::findOrFail($id);
        return view('admin.scoutmail-package.edit' , compact('packageedit'));
    }

    public function packageupdate(Request $request,$id)
    {

        $packageupdate=ScoutMailPackage::findORFail($id);

        if ($request->file('image')!=null) {
            $image = $request->file('image');
            $destinationPath = public_path('image/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $packageupdate->image = $profileImage;
        }else{

        }
        $packageupdate->name=$request->name;
        $packageupdate->price=$request->price;
        $packageupdate->message_limit=$request->message_limit;
        $packageupdate->image=$request->image;
        $packageupdate->save();

        return redirect()->route('scouitmail-package.view')
                        ->with('success','Package updated successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $scoutmail=ScoutMail::all();
        return view('admin.scout-mail.scouitmail',compact('scoutmail'));

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
        $packageedit = ScoutMailPackage::findOrFail($id);
        $packageedit->delete();

        return redirect()->route('scouitmail-package.view')
                        ->with('success','Package deleted successfully');
    }
}
