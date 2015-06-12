<?php namespace App\Http\Controllers\Owner;

use App\Models\Supplier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class SupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$suppliers = Supplier::all();
		return view('owner.suppliers.index', compact('suppliers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('owner.suppliers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$supplier=Request::all();
   		Supplier::create($supplier);
   		return redirect('owner/suppliers');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$supplier=Supplier::find($id);
   		return view('owner.suppliers.show',compact('supplier'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$supplier=Supplier::find($id);
   		return view('owner.suppliers.edit',compact('supplier'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$supplierUpdate=Request::all();
   		$supplier=Supplier::find($id);
   		$supplier->update($supplierUpdate);
   		return redirect('owner/suppliers');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		Supplier::find($id)->delete();
   		return redirect('owner/suppliers');
	}

}
