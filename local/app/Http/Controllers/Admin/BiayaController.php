<?php namespace App\Http\Controllers\Admin;

use App\Models\Biaya;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use DB;


class BiayaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$biayas = Biaya::paginate(10);
		return view('admin.biayas.index', compact('biayas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin.biayas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$biaya=Request::all();
   		Biaya::create($biaya);
   		return redirect('admin/biayas');
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
		$biaya=Biaya::find($id);
   		return view('admin.biayas.show',compact('biaya'));
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
		$biaya=Biaya::find($id);
   		return view('admin.biayas.edit',compact('biaya'));
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
		$biayaUpdate=Request::all();
   		$biaya=Biaya::find($id);
   		$biaya->update($biayaUpdate);
   		return redirect('admin/biayas');
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
		Biaya::find($id)->delete();
   		return redirect('admin/biayas');
	}

}
