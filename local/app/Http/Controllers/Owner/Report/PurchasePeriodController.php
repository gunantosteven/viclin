<?php namespace App\Http\Controllers\Owner\Report;

use App\Models\Beli;
use App\Models\Supplier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;

use PDF;
use App;
use View;

class PurchasePeriodController extends Controller {

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
		$belis = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)->get();
    	$suppliers = Supplier::all();
		return view('/owner/report/purchaseperiod', compact('belis', 'suppliers', 'tanggalawal', 'tanggalakhir'));
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
		$idsupp = Request::input('idsupp');
		$belis = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)
    				->where('idsupp', 'like', $idsupp)->get();
		$pdf = PDF::loadView('owner.report.pdf.reportpurchaseperiod', compact('belis', 'tanggalawal', 'tanggalakhir', 'idsupp'));
		return $pdf->setPaper('a4')->stream('reportpurchaseperiod' . '.pdf');
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
