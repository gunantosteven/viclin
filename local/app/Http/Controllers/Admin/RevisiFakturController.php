<?php namespace App\Http\Controllers\Admin;

use App\Models\Revisi;
use App\Models\Jual;
use App\Models\DetilJual;
use App\Models\Item;
use App\Models\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
use DB;

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
		$juals = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->get();
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
		$juals = Jual::where('tglorderjual', '>=', Request::input('tanggalawal'))
    				->where('tglorderjual', '<=', Request::input('tanggalakhir'))->get();
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
		else if(Request::input('success') != "")
		{
			$success = true;
	   		return view('/admin/sales/revisifakturupdate', compact('jual', 'detiljuals', 'items', 'customers', 'success'));
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
		if(Request::input('nikcust') == "" || Request::input('tglorderjual') == "" || Request::input('tgltempojual') == "" || Request::input('deliverydate') == "" 
			|| Request::input('biayaekspjual') == "" ||  Request::input('biayastereo') == "")
		{
			return redirect('admin/sales/revisifaktur/' . $nojual . '?validasi=true');
		}


		//insert to table revisi
		$jualNow = DB::table('jual')->where('nojual', '=', $nojual)->first();
		$datetoday = date('Y-m-d');
		if(Request::input('nikcust') != $jualNow->nikcust)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nojual,
				    'dataawal' => DB::table('customers')->where('id', '=', $jualNow->nikcust)->first()->namacust,
				    'dataakhir' => DB::table('customers')->where('id', '=', Request::input('nikcust'))->first()->namacust,
				    'keterangan' => 'Update Customer',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('tglorderjual') != $jualNow->tglorderjual)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nojual,
				    'dataawal' => $jualNow->tglorderjual,
				    'dataakhir' => Request::input('tglorderjual'),
				    'keterangan' => 'Update Date Sales Order',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('tgltempojual') != $jualNow->tgltempojual)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nojual,
				    'dataawal' => $jualNow->tgltempojual,
				    'dataakhir' => Request::input('tgltempojual'),
				    'keterangan' => 'Update Due Date',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('deliverydate') != $jualNow->deliverydate)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nojual,
				    'dataawal' => $jualNow->deliverydate,
				    'dataakhir' => Request::input('deliverydate'),
				    'keterangan' => 'Update Delivery Date',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('biayaekspjual') != $jualNow->biayaekspjual)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nojual,
				    'dataawal' => $jualNow->biayaekspjual,
				    'dataakhir' => Request::input('biayaekspjual'),
				    'keterangan' => 'Update Expedition Cost',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('biayastereo') != $jualNow->biayastereo)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nojual,
				    'dataawal' => $jualNow->biayastereo,
				    'dataakhir' => Request::input('biayastereo'),
				    'keterangan' => 'Update Styrofoam Cost',
				    'status' => 'UNREAD'
			));
		}
		// end to revisi
		

		//
		$jualUpdate=Request::all();
   		$jual=Jual::where('nojual', '=', $nojual)->get()->first();
   		$jual->update($jualUpdate);
   		return redirect('admin/sales/revisifaktur/' . $nojual . '?success=true');
	}
}
