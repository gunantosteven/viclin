<?php namespace App\Http\Controllers\Owner;

use App\Models\Supplier;
use App\Models\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

use DB;

class DetailInputFakturController extends Controller {



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
	public function store(Request $request)
	{
		//
		//validasi
		if($request->input('idbrg') == "" || $request->input('hargasatuankg') == "" || $request->input('jumlahkg') == "" 
			|| $request->input('jumlahekor') == "")
		{
			return redirect('owner/purchase/inputfaktur?validasi=true');
		}
		//validasi the same item
		$purchaseitems = Session::get('purchaseitems');
		if($purchaseitems != null)
		{
			$purchaseitems = Session::get('purchaseitems');
			foreach ($purchaseitems as $index => $item) {
				if ($item['idbrg'] == $request->input('idbrg')) {
			    	return redirect('owner/purchase/inputfaktur?checkitem=true');
			    }
			}
		}
		

		//
		date_default_timezone_set('Asia/Bangkok');
		$id = 'DB-' . date('Ymd-H.i.s');
		Session::push('purchaseitems', [
          'idbrg' => $request->input('idbrg'),
          'hargasatuankg' => $request->input('hargasatuankg'),
          'jumlahkg' => $request->input('jumlahkg'),
          'jumlahekor' => $request->input('jumlahekor'),
          'keterangan' => $request->input('keterangan'),
          'id' => $id
      	]);
		return redirect('owner/purchase/inputfaktur');
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
			Session::forget('purchaseitems');

			return redirect('owner/purchase/inputfaktur');
		}

		$purchaseitems = Session::get('purchaseitems');
		foreach ($purchaseitems as $index => $item) {
			if ($item['id'] == $id) {
		    	unset($purchaseitems[$index]);
		    }
		}
		
		session(['purchaseitems' => $purchaseitems]);

		return redirect('owner/purchase/inputfaktur');
	}

}
