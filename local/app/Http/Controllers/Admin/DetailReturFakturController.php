<?php namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use App\Models\DetilRetur;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use Log;

class DetailReturFakturController extends Controller {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$id = 'DRJ-' . date('Ymd-H.i.s');
		Session::push('retursalesitems', [
          'kodebrg' => Request::input('kodebrg'),
          'hargasatuankgretjual' => Request::input('hargasatuankgretjual'),
          'jumlahkgretjual' => Request::input('jumlahkgretjual'),
          'jumlahekorretjual' => Request::input('jumlahekorretjual'),
          'newsretjual' => Request::input('newsretjual'),
          'id' => $id
      	]);
		return redirect('admin/sales/returperfaktur');
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
	 * @param  string  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		if($id == -1)
		{
			Session::forget('retursalesitems');

			return redirect('admin/sales/returperfaktur');
		}

		$retursalesitems = Session::get('retursalesitems');
		foreach ($retursalesitems as $index => $item) {
			if ($item['id'] == $id) {
		    	unset($retursalesitems[$index]);
		    }
		}
		
		session(['retursalesitems' => $retursalesitems]);

		return redirect('admin/sales/returperfaktur');
	}

}
