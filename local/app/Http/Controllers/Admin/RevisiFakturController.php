<?php namespace App\Http\Controllers\Admin;

use App\Models\Jual;
use App\Models\DetilJual;
use App\Models\Item;
use App\Models\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class RevisiFakturController extends Controller {

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
		return view('/admin/sales/revisifaktur', compact('juals', 'tanggalawal', 'tanggalakhir'));
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function showfaktur()
	{
		//
		$juals = Jual::where('tglfaktur', '>=', Request::input('tanggalawal'))
    				->where('tglfaktur', '<=', Request::input('tanggalakhir'))->get();
    	$tanggalawal = Request::input('tanggalawal');
    	$tanggalakhir = Request::input('tanggalakhir');
    	return view('/admin/sales/revisifaktur', compact('juals', 'tanggalawal', 'tanggalakhir'));
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
		$jual = Jual::where('nojual', '=', $nojual)->get()->first();
		$detiljuals = DetilJual::where('nojual', '=', $nojual)->get();
		$items = Item::all();
		$customers = Customer::all();
		if(Request::input('validasi') != "")
		{
			$validasi = true;
	   		return view('/admin/sales/revisifakturupdate', compact('jual', 'detiljuals', 'items', 'customers', 'validasi'));
		}
		else if(Request::input('checkstock') != "")
		{
			$checkstock = true;
	   		return view('/admin/sales/revisifakturupdate', compact('jual', 'detiljuals', 'items', 'customers', 'checkstock'));
		}
		else if(Request::input('checkitem') != "")
		{
			$checkitem = true;
	   		return view('/admin/sales/revisifakturupdate', compact('jual', 'detiljuals', 'items', 'customers', 'checkitem'));
		}

		return view('admin.sales.revisifakturupdate', compact('jual', 'detiljuals', 'items', 'customers'));
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
		if(Request::input('nikcust') == "" || Request::input('tglorderjual') == "" || Request::input('tgltempojual') == "" 
			|| Request::input('biayaekspjual') == "" ||  Request::input('biayastereo') == "" || Request::input('kursbaru') == "")
		{
			return redirect('admin/sales/revisifaktur/' . $nojual . '?validasi=true');
		}

		//
		$jualUpdate=Request::all();
   		$jual=Jual::where('nojual', '=', $nojual)->get()->first();
   		$jual->update($jualUpdate);
   		return redirect('admin/sales/revisifaktur/' . $nojual);
	}
}
