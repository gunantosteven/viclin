<?php namespace App\Http\Controllers\Admin;

use App\Models\Cost;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use DB;


class CostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$costs = Cost::paginate(10);
		return view('admin.costs.index', compact('costs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin.costs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$cost=Request::all();
   		Cost::create($cost);
   		return redirect('admin/costs');
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
		$cost=Cost::find($id);
   		return view('admin.costs.show',compact('cost'));
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
		$cost=Cost::find($id);
   		return view('admin.costs.edit',compact('cost'));
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
		$costUpdate=Request::all();
   		$cost=Cost::find($id);
   		$cost->update($costUpdate);
   		return redirect('admin/costs');
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
		Cost::find($id)->delete();
   		return redirect('admin/costs');
	}

}
