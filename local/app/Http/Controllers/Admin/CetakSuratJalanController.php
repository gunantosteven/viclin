<?php namespace App\Http\Controllers\Admin;

use App\Models\Jual;
use App\Models\DetilJual;
use App\Models\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PDF;
use App;
use View;

class CetakSuratJalanController extends Controller {


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
		$juals = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->get();
		return view('/admin/sales/cetaksuratjalan', compact('juals', 'tanggalawal', 'tanggalakhir'));	
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function showfaktur(Request $request)
	{
		//
		$juals = Jual::where('tglorderjual', '>=', $request->input('tanggalawal'))
    				->where('tglorderjual', '<=', $request->input('tanggalakhir'))->get();
    	$tanggalawal = $request->input('tanggalawal');
    	$tanggalakhir = $request->input('tanggalakhir');
    	return view('/admin/sales/cetaksuratjalan', compact('juals', 'tanggalawal', 'tanggalakhir'));
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function cetak($nojual)
	{
		//
		$jual = Jual::where('nojual', '=', $nojual)->first();
    	$detiljuals = DetilJual::where('nojual', '=', $nojual)->get();
    	$customer = Customer::where('id', '=', $jual->nikcust)->first();
		$pdf = PDF::loadView('admin.sales.pdf.reportsuratjalanfaktur', compact('jual', 'detiljuals', 'customer'));
		return $pdf->setPaper('a5')->setOrientation('landscape')->stream('suratjalan' . $nojual .'.pdf');
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
