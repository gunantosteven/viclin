<?php namespace App\Http\Controllers\Owner;

use App\Models\Beli;
use App\Models\DetilBeli;
use App\Models\Supplier;
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
		$suppliers = Supplier::all();
		$items = Item::all();
		if($request->input('validasi') != "")
		{
			$validasi = true;
	   		return view('/owner/purchase/inputfaktur', compact('suppliers', 'items', 'validasi'));
		}
		else if($request->input('checkstock') != "")
		{
			$checkstock = true;
	   		return view('/owner/purchase/inputfaktur', compact('suppliers', 'items', 'checkstock'));
		}
		else if($request->input('checkitem') != "")
		{
			$checkitem = true;
	   		return view('/owner/purchase/inputfaktur', compact('suppliers', 'items', 'checkitem'));
		}
		else if($request->input('checkdetail') != "")
		{
			$checkdetail = true;
	   		return view('/owner/purchase/inputfaktur', compact('suppliers', 'items', 'checkdetail'));
		}
		return view('/owner/purchase/inputfaktur', compact('suppliers', 'items'));
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
		if($request->input('idsupp') == "" || $request->input('tglorderbeli') == "" || $request->input('tgltempobeli') == "" 
		    || $request->input('biayakarantina') == "" || $request->input('biayaclearance') == "" 
			||  $request->input('biayaimpor') == "" || $request->input('biayalab') == "" || $request->input('biayafreight') == "")
		{
			return redirect('owner/purchase/inputfaktur?validasi=true');
		}
		else if(Session::get('purchaseitems') == null)
		{
			return redirect('owner/purchase/inputfaktur?checkdetail=true');
		}

		$purchaseitems = Session::get('purchaseitems');

		// calculate grossweight
		$grossweight = 0;
		foreach ($purchaseitems as $index => $item) {
				$grossweight += $item['jumlahkg'];
		}

		// calculate micellanous cost 
		$cif = $request->input('cif');
		$bm = $cif * 0.05;
		$pph = ($bm+$cif) * 0.025;
		$storage = 1 * $grossweight * 600;
		$trmc = $grossweight * 500;
		$spc = $trmc;
		$time = $trmc;
		$dokumen = 20000;
		$ppn = ( $storage + $trmc + $spc + $time + $dokumen ) * 0.1;
		$stamp = 3000;

		// calculate micellanous cost 
		$handling = 400000;
		if($grossweight >  50)
			$over = ($grossweight-50) * 2000;
		else
			$over = 0;
		$adm = 100000;
		$edi = 100000;
		$rush = 2000000;


		//
		date_default_timezone_set('Asia/Bangkok');
		$nobeli = 'B-' . date('Ymd-H.i.s');

		$datetoday = date('Y-m-d');
   		Beli::create(array(
		    'nobeli' => $nobeli,
		    'idsupp' => $request->input('idsupp'),
		    'user' => Auth::user()->id,
		    'tglorderbeli' => $request->input('tglorderbeli'),
		    'tgltempobeli' => $request->input('tgltempobeli'),
		    'biayakarantina' => $request->input('biayakarantina'),
		    'biayaclearance' => $request->input('biayaclearance'),
		    'biayaimpor' => $request->input('biayaimpor'),
		    'biayalab' => $request->input('biayalab'),
		    'biayafreight' => $request->input('biayafreight'),
		    'cif' => $cif,
		    'bm' => $bm,
		    'pph' => $pph,
		    'storage' => $storage,
		    'trmc' => $trmc,
		    'spc' => $spc,
		    'time' => $time,
		    'dokumen' => $dokumen,
		    'ppn' => $ppn,
		    'stamp' => $stamp,
		    'handling' => $handling,
		    'over' => $over,
		    'adm' => $adm,
		    'edi' => $edi,
		    'rush' => $rush,
		    'tglfaktur' => $datetoday,
        ));

   		
        foreach ($purchaseitems as $index => $item) {
        		DB::table('items')->where('kodebrg', '=', $item['kodebrg'])->increment('stokkg', $item['jumlahkg']);
        		DB::table('items')->where('kodebrg', '=', $item['kodebrg'])->increment('stokbrg', $item['jumlahekor']);
				DetilBeli::create(array(
			    'nobeli' => $nobeli,
			    'kodebrg' => $item['kodebrg'],
			    'hargasatuankg' => $item['hargasatuankg'],
			    'jumlahkg' => $item['jumlahkg'],
			    'jumlahekor' => $item['jumlahekor'],
			    'keterangan' => $item['keterangan']
	        ));
		}

		// destroy session
		Session::forget('purchaseitems');

		$suppliers = Supplier::all();
		$items = Item::all();
   		return view('/owner/purchase/inputfaktur', compact('suppliers', 'items', 'nobeli'));
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
