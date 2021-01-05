<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
	
	public function apiIndex(){
		$employees = Employee::all();
		return response()->json($employees);
	}

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$employees = Employee::paginate(2);
		return view('employees', ['employees'=>$employees]);
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$companies = Company::all();
		return view('createEmployee', ['companies' => $companies]);
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		$request->validate([
			'last_name' => 'required',
			'first_name' => 'required',
			'position' => 'required',
			'phone' => 'required',
			'mail' => 'required',
			'company_id' => 'required'
			]);
			
		$employee = new Employee([
			'last_name' => $request->get('last_name'),
			'first_name' => $request->get('first_name'),
			'position' => $request->get('position'),
			'phone' => $request->get('phone'),
			'mail' => $request->get('mail'),
			'company_id' => $request->get('company_id')
		]);
				
		$employee->save();
		
		return redirect()->route('employees');
	}
			
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		$employee = Employee::all()->find($id);
		return view('employee', ['employee'=>$employee]);
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		$employee = Employee::find($id);
		$companies = Company::all();
		return view('editEmployee', ['employee'=>$employee, 'companies'=>$companies]);
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
		$employee = Employee::find($id);
		$employee->fill($request->all());
		$employee->save();
		return redirect()->route('showEmployee', ['id'=>$employee->id]);
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
		return redirect()->route('employees');
	}
}
		