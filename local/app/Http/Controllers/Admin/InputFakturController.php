<?php namespace App\Http\Controllers\Admin;

use App\Models\Jual;
use App\Models\DetilJual;
use App\Models\Customer;
use App\Models\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;

class InputFakturController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//
		$customers = Customer::all();
		$items = Item::all();
		if($request->input('validasi') != "")
		{
			$validasi = true;
	   		return view('/admin/sales/inputfaktur', compact('customers', 'items', 'validasi'));
		}
		else if($request->input('checkstock') != "")
		{
			$checkstock = true;
	   		return view('/admin/sales/inputfaktur', compact('customers', 'items', 'checkstock'));
		}
		else if($request->input('checkitem') != "")
		{
			$checkitem = true;
	   		return view('/admin/sales/inputfaktur', compact('customers', 'items', 'checkitem'));
		}
		else if($request->input('checkdetail') != "")
		{
			$checkdetail = true;
	   		return view('/admin/sales/inputfaktur', compact('customers', 'items', 'checkdetail'));
		}
		return view('/admin/sales/inputfaktur', compact('customers', 'items'));
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
		// Validasi
		if($request->input('idcust') == "" || $request->input('tglorderjual') == "" || $request->input('tgltempojual') == "" 
			|| $request->input('biayaekspjual') == "" ||  $request->input('biayastereo') == "" || $request->input('kursbaru') == "")
		{
			return redirect('admin/sales/inputfaktur?validasi=true');
		}
		else if(Session::get('salesitems') == null)
		{
			return redirect('admin/sales/inputfaktur?checkdetail=true');
		}

		//
		date_default_timezone_set('Asia/Bangkok');
		$nojual = 'J-' . date('Ymd-H.i.s');

		$datetoday = date('Y-m-d');
   		Jual::create(array(
		    'nojual' => $nojual,
		    'nikcust' => $request->input('idcust'),
		    'user' => Auth::user()->id,
		    'tglorderjual' => $request->input('tglorderjual'),
		    'tgltempojual' => $request->input('tgltempojual'),
		    'biayaekspjual' => $request->input('biayaekspjual'),
		    'biayastereo' => $request->input('biayastereo'),
		    'kursbaru' => $request->input('kursbaru'),
		    'tglfaktur' => $datetoday,
        ));

   		$salesitems = Session::get('salesitems');
        foreach ($salesitems as $index => $item) {
        		DB::table('items')->where('kodebrg', '=', $item['kodebrg'])->decrement('stokkg', $item['jumlahkg']);
        		DB::table('items')->where('kodebrg', '=', $item['kodebrg'])->decrement('stokbrg', $item['jumlahekor']);
				DetilJual::create(array(
			    'nojual' => $nojual,
			    'kodebrg' => $item['kodebrg'],
			    'hargasatuankg' => $item['hargasatuankg'],
			    'jumlahkg' => $item['jumlahkg'],
			    'jumlahekor' => $item['jumlahekor'],
			    'noofbox' => $item['noofbox'],
			    'keterangan' => $item['keterangan']
	        ));
		}
		
		// destroy session
		Session::forget('salesitems');

		$customers = Customer::all();
		$items = Item::all();
   		return view('/admin/sales/inputfaktur', compact('customers', 'items', 'nojual'));
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
