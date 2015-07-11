<?php namespace App\Http\Controllers\Owner;

use App\Models\Revisi;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
use DB;

class HistoryRevisiSalesController extends Controller {

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
		$revisis = Revisi::where('tglrevisi', '>=', $tanggalawal)
    				->where('tglrevisi', '<=', $tanggalakhir)
    				->where('jualbeli', 'like',  'J-%')->get();
		return view('/owner/history/revisisales', compact('revisis', 'tanggalawal', 'tanggalakhir'));
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function showfaktur()
	{
		//
		$revisis = Revisi::where('tglrevisi', '>=', Request::input('tanggalawal'))
    				->where('tglrevisi', '<=', Request::input('tanggalakhir'))
    				->where('jualbeli', 'like',  'J-%')->get();
    	$tanggalawal = Request::input('tanggalawal');
    	$tanggalakhir = Request::input('tanggalakhir');
    	return view('/owner/history/revisisales', compact('revisis', 'tanggalawal', 'tanggalakhir'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($nojual)
	{
		//
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($nojual)
	{
		// Validasi
		
	}
}
