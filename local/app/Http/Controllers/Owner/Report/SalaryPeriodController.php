<?php namespace App\Http\Controllers\Owner\Report;

use App\Models\Salary;
use App\Models\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;

use PDF;
use App;
use View;

class SalaryPeriodController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
    	$employees = Employee::all();
		return view('/owner/report/salaryperiod', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$bulan = Request::input('bulan');
		$tahun = Request::input('tahun');
		$idemp = Request::input('idemp');
		$salaries = Salary::where('bulan', $bulan)
    				->where('tahun', $tahun)
    				->where('idemp', 'like', $idemp)->get();
		$pdf = PDF::loadView('owner.report.pdf.reportsalaryperiod', compact('salaries', 'bulan', 'tahun', 'idemp'));
		return $pdf->setPaper('a4')->stream('reportsalaryperiod' . '.pdf');
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
	}

}
