<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageOrders;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.packages.create');
    }

    public function order()
    {
        $orders= PackageOrders::all();
        return view('admin.packages.orders',compact('orders'));
    }
    public function activate($id)
    {
        $package=PackageOrders::findORFail($id);

        $future_timestamp = strtotime("+1 month");
        $date = date('Y-m-d', $future_timestamp);

        if($package->status=='pending'){
            $package->status ='activate';
            $package->expiry_date = $date;
            $package->update();
            return redirect()->back();
        }else{
            $package->status =='cancle';
            $package->status ='activate';
            $package->expiry_date = $date;
            $package->update();
            return redirect()->back();


        }


    }
    public function cancle($id)
    {
        $package=PackageOrders::findORFail($id);

            $package->status ='cancle';
            $package->expiry_date= null;
            $package->update();
            return redirect()->back();

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $package=new Package();
        $package->name=$request->input('name');
        $package->price=$request->input('price');
        $package->limit=$request->input('limit');
        $package->save();
        return redirect()->route('package.show')->with('success', "Package has been added Successfully");


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
    public function show()
    {
        $package=Package::get();

        return view('admin.packages.view ',compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $package = Package::findOrFail($id);
        return view('admin.packages.edit' , compact('package'));

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
        $package = Package::findOrFail($id);

        $package->name = $request->name;
        $package->price = $request->price;
        $package->limit = $request->limit;
        $package->save();
        return redirect()->route('package.show')->with('success', "Package has been Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('package.show')->with('success', "Package has been deleted Successfully");

    }
}
