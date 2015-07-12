<?php namespace App\Http\Controllers\Owner\Report;

use App\Models\Jual;
use App\Models\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;

use PDF;
use App;
use View;

class SalesPeriodController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$tanggalawal = date('Y-m-d');
    	$tanggalakhir = date('Y-m-d');
		$juals = Jual::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->get();
    	$customers = Customer::all();
		return view('/owner/report/salesperiod', compact('juals', 'customers', 'tanggalawal', 'tanggalakhir'));
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
		$tanggalawal = Request::input('tanggalawal');
		$tanggalakhir = Request::input('tanggalakhir');
		$nikcust = Request::input('nikcust');
		$juals = Jual::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)
    				->where('nikcust', 'like', $nikcust)->get();
		$pdf = PDF::loadView('owner.report.pdf.reportsalesperiod', compact('juals', 'tanggalawal', 'tanggalakhir', 'nikcust'));
		return $pdf->setPaper('a4')->stream('reportsalesperiod' . '.pdf');
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
