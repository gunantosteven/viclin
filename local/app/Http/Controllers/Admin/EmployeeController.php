<?php namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use DB;


class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if(Input::has('search'))
		{
			$search = Input::get('search'); 
			$employees = DB::table('employees')
	        ->where('namaemp', 'LIKE', "%$search%")
	        ->orWhere('alamatemp', 'LIKE', "%$search%")
	        ->paginate(30);
		}
		else
		{
			$employees = Employee::paginate(10);
		}
		if(Request::input('success') == true)
		{
			$success = true;
			return view('admin.employees.index', compact('employees', 'success'));
		}
		return view('admin.employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin.employees.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$employee=Request::all();
   		Employee::create($employee);
   		return redirect('admin/employees?success=true');
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
		$employee=Employee::find($id);
   		return view('admin.employees.show',compact('employee'));
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
		$employee=Employee::find($id);
   		return view('admin.employees.edit',compact('employee'));
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
		$employeeUpdate=Request::all();
   		$employee=Employee::find($id);
   		$employee->update($employeeUpdate);
   		return redirect('admin/employees?success=true');
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
		Employee::find($id)->delete();
   		return redirect('admin/employees');
	}

}
