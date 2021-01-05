<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Employee;

class ProductController extends Controller
{

	public function apiIndex(){
		$products = Product::with('employee')->get();
		return response()->json($products);
	}

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$products = Product::all();
		return view('products', ['products' => $products]);
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$employees = Employee::all();
		return view('createProduct', ['employees' => $employees]);
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
			'price' => 'required',
			'employee_id' => 'required'
		]);

		$product = new Product([
			'name' => $request->get('name'),
			'price' => $request->get('price'),
			'employee_id' => $request->get('employee_id')
		]);
		$product->save();

		return redirect()->route('products');
	}
	
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		$product = Product::find($id);
		return view('product', ['product' => $product]);
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		$product = Product::find($id);
		return view('editProduct', ['product' => $product]);
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
		$product = Product::find($id);
		$product->fill($request->all());
		$product->save();
		return redirect()->route('product', ['product' => $id]);
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();
		return redirect()->route('products');
	}
}
