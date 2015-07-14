<?php namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Salary;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use DB;


class SalaryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$salaries = Salary::paginate(10);
		return view('admin.salaries.index', compact('salaries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$employees = Employee::all();
		return view('admin.salaries.create', compact('employees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$salary=Request::all();
   		Salary::create($salary);
   		return redirect('admin/salaries');
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
		$salary=Salary::find($id);
   		return view('admin.salaries.show',compact('salary'));
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
		$employees = Employee::all();
		$salary=Salary::find($id);
   		return view('admin.salaries.edit',compact('salary', 'employees'));
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
		$salaryUpdate=Request::all();
   		$salary=Salary::find($id);
   		$salary->update($salaryUpdate);
   		return redirect('admin/salaries');
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
		Salary::find($id)->delete();
   		return redirect('admin/salaries');
	}

}
