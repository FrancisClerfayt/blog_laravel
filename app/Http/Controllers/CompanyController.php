<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
	
	public function apiIndex(){
		$companies = Company::all();
		return response()->json($companies);
	}

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$companies = Company::all();
		return view('companies', ['companies'=>$companies]);
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		return view('createCompany');
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
			'name' => 'required',
			'address' => 'required',
			'zip_code' => 'required',
			'city' => 'required',
			'annual_sales' => 'required'
		]);
			
		$company = new Company([
			'name' => $request->get('name'),
			'address' => $request->get('address'),
			'zip_code' => $request->get('zip_code'),
			'city' => $request->get('city'),
			'annual_sales' => $request->get('annual_sales')
		]);
		$company->save();
		return redirect()->route('companies');
	}
			
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		$company = Company::find($id);
		return view('company', ['company'=>$company]);
	}
			
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		$company = Company::find($id);
		return view('editCompany', ['company'=>$company]);
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
		$company = Company::all()->find($id);
		$company->fill($request->all());
		$company->save();
		return redirect()->route('showCompany', ['id' => $company]);
	}
			
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		$company = Company::find($id);
		$company->delete();
		return redirect()->route('companies');
	}
}