<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EMployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id'    =>  'required',
            'employee_name'    =>  'required',
            'emplast_name'     =>  'required',
            'emp_dept'    =>  'required',
            'age'    =>  'required',
        ]);
        $employee = new employee([
            'employee_id'    =>  $request->get('employee_id'),
            'employee_name'    =>  $request->get('employee_name'),
            'emplast_name'     =>  $request->get('emplast_name'),
            'emp_dept'    =>  $request->get('emp_dept'),
            'age'    =>  $request->get('first_name')
        ]);
        $employee->save();
        return redirect()->route('employee.create')->with('success', 'Data Added');
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
        $employee = employee::find($id);
        return view('employee.edit', compact('employee', 'employeeid'));
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
        $this->validate($request, [
            'employee_name'    =>  'required',
            'emplast_name'     =>  'required'
        ]);
        $employee = Employee::find($id);
        $employee->employee_name = $request->get('employee_name');
        $employee->emplast_name = $request->get('emplast_name');
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Data Deleted');

    }
}