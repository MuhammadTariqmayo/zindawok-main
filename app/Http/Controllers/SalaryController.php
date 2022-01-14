<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary=Salary::get();
        return view('admin.salary.view',compact('salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validation in laravel
         $this->validate($request, [
            'start_salary' => 'required|unique:salaries|max:255',
            'end_salary' => 'required|unique:salaries|max:255',

        ]);



        // Store the data in industry...

        $salary = new Salary();

        $salary->start_salary = $request->input('start_salary');
        $salary->end_salary = $request->input('end_salary');

        $salary->save();

        return redirect()->route('admin_salary_view')->with('success', "Salary has been added successfully");
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

        $decrypted = Crypt::decrypt($id);
        $salary = Salary::findOrFail( $decrypted );
        return view('admin.salary.edit' , compact('salary'));
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

        $salary = Salary::findOrFail($id);

        $salary->start_salary = $request->start_salary;
        $salary->end_salary = $request->end_salary;

        $salary->save();

        return redirect()->route('admin_salary_view')->with('success', "salary has been updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodID = Crypt::decrypt($id);

        $salary = Salary::find($prodID);
        $salary->delete();
        return redirect()->route('admin_salary_view')->with('success', "Salary has been deleted Successfully");
    }
}
