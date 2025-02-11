<?php namespace App\Http\Controllers\Admin;

use App\Models\Customer;
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

		//validasi
		if($request->input('idbrg') == "" || $request->input('hargasatuankg') == "" || $request->input('jumlahkg') == "" 
			|| $request->input('jumlahekor') == "" || $request->input('noofbox') == "")
		{
			return redirect('admin/sales/inputfaktur?validasi=true');
		}
		//validasi stock
		$itemNow = DB::table('items')->where('id', $request->input('idbrg'))->first();
		$jumlahKg = $request->input('jumlahkg');
		$jumlahEkor = $request->input('jumlahekor');
		if($itemNow->stokkg - $jumlahKg < 0 || $itemNow->stokbrg - $jumlahEkor < 0)
		{
			return redirect('admin/sales/inputfaktur?checkstock=true');
		}
		//validasi the same item
		$salesitems = Session::get('salesitems');
		if($salesitems != null)
		{
			$salesitems = Session::get('salesitems');
			foreach ($salesitems as $index => $item) {
				if ($item['idbrg'] == $request->input('idbrg')) {
			    	return redirect('admin/sales/inputfaktur?checkitem=true');
			    }
			}
		}
		

		//
		date_default_timezone_set('Asia/Bangkok');
		$id = 'DJ-' . date('Ymd-H.i.s');
		Session::push('salesitems', [
          'idbrg' => $request->input('idbrg'),
          'hargasatuankg' => $request->input('hargasatuankg'),
          'jumlahkg' => $request->input('jumlahkg'),
          'jumlahekor' => $request->input('jumlahekor'),
          'noofbox' => $request->input('noofbox'),
          'keterangan' => $request->input('keterangan'),
          'id' => $id
      	]);
		return redirect('admin/sales/inputfaktur');
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
			Session::forget('salesitems');

			return redirect('admin/sales/inputfaktur');
		}

		$salesitems = Session::get('salesitems');
		foreach ($salesitems as $index => $item) {
			if ($item['id'] == $id) {
		    	unset($salesitems[$index]);
		    }
		}
		
		session(['salesitems' => $salesitems]);

		return redirect('admin/sales/inputfaktur');
	}

}
