<?php namespace App\Http\Controllers\Admin;

use App\Models\Jual;
use App\Models\ReturJual;
use App\Models\AsalReturJual;
use App\Models\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use Auth;

class ReturPerFakturController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$items = Item::all();
		$juals = Jual::all();
		return view('/admin/sales/returperfaktur', compact('items', 'juals'));
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
		date_default_timezone_set('Asia/Bangkok');
		$noreturjual = 'RJ-' . date('Ymd-H.i.s');
		$datetoday = date('Y-m-d');
   		ReturJual::create(array(
		    'noreturjual' => $noreturjual,
		    'user' => Auth::user()->id,
		    'tglreturjual' => Request::input('tglreturjual')
        ));

   		$retursalesitems = Session::get('retursalesitems');
	        foreach ($retursalesitems as $index => $item) {
					AsalReturJual::create(array(
				    'noreturjual' => $noreturjual,
				    'nojual' => Request::input('nojual'),
				    'kodebrg' => $item['kodebrg'],
				    'hargasatuankgretjual' => $item['hargasatuankgretjual'],
				    'jumlahkgretjual' => $item['jumlahkgretjual'],
				    'jumlahekorretjual' => $item['jumlahekorretjual'],
				    'newsretjual' => $item['newsretjual']
		        ));
			}

		// destroy session
		Session::forget('retursalesitems');

   		return redirect('/admin/sales/returperfaktur');
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
