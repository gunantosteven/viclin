<?php namespace App\Http\Controllers\Owner;

use App\Models\Revisi;
use App\Models\Beli;
use App\Models\DetilBeli;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

use DB;
use Auth;

class DetailRevisiFakturController extends Controller {



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
			|| $request->input('jumlahekor') == "")
		{
			return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli') . '?validasi=true');
		}
		//validasi the same item
		$detilbeli = DB::table('detilbeli')->where('nobeli', '=', $request->input('nobeli'))->where('idbrg', '=', $request->input('idbrg'))->first();
		if($detilbeli != null && $detilbeli->idbrg == $request->input('idbrg'))
		{
			return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli') . '?checkitem=true');
		}


		//insert to table revisi
		$datetoday = date('Y-m-d');
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => DB::table('items')->where('id', $request->input('idbrg'))->first()->kodebrg,
				    'keterangan' => 'Add Item Code',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('hargasatuankg'),
				    'keterangan' => 'Add Unit Price Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('jumlahkg'),
				    'keterangan' => 'Add Total Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('jumlahekor'),
				    'keterangan' => 'Add Total Pcs',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('keterangan'),
				    'keterangan' => 'Add Information',
				    'status' => 'UNREAD'
		));
		// end insert to revisi

		//
		DB::table('items')->where('id', '=', $request->input('idbrg'))->increment('stokkg', $request->input('jumlahkg'));
        DB::table('items')->where('id', '=', $request->input('idbrg'))->increment('stokbrg', $request->input('jumlahekor'));
		DetilBeli::create(array(
				    'nobeli' => $request->input('nobeli'),
				    'idbrg' => $request->input('idbrg'),
				    'hargasatuankg' => $request->input('hargasatuankg'),
				    'jumlahkg' => $request->input('jumlahkg'),
				    'jumlahekor' => $request->input('jumlahekor'),
				    'keterangan' => $request->input('keterangan')
		));

		// calculate grossweight
		$grossweight = 0;
		$detilbelis = DB::table('detilbeli')->where('nobeli', '=', $request->input('nobeli'))->get();
		foreach ($detilbelis as $index => $detilbeli) {
				$grossweight += $detilbeli->jumlahkg;
		}

		// calculate micellanous cost 
		$cif = DB::table('beli')->where('nobeli', '=', $request->input('nobeli'))->first()->cif;
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
		//end

		$beli=Beli::where('nobeli', '=', $request->input('nobeli'))
				->update(['storage' => $storage, 'trmc' => $trmc, 'spc' => $spc, 'time' => $time, 'ppn' => $ppn, 'over' => $over]);


		return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli'));
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
	public function destroy(Request $request, $id)
	{
		//
		$detilbeliNow = DB::table('detilbeli')->where('id', '=', $id)->first();

		//validasi stock
		$itemNow = DB::table('items')->where('id', $detilbeliNow->idbrg)->first();
		$jumlahKg = $detilbeliNow->jumlahkg;
		$jumlahEkor = $detilbeliNow->jumlahekor;
		if($itemNow->stokkg - $jumlahKg < 0 || $itemNow->stokbrg - $jumlahEkor < 0)
		{
			return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli') . '?checkstock=true');
		}

		
		//insert to table revisi
		$datetoday = date('Y-m-d');
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => DB::table('items')->where('id', $detilbeliNow->idbrg)->first()->kodebrg,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Item Code',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->hargasatuankg,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Unit Price Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->jumlahkg,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Total Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->jumlahekor,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Total Pcs',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->keterangan,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Information',
				    'status' => 'UNREAD'
		));
		// end insert to revisi

		DB::table('items')->where('id', '=', $detilbeliNow->idbrg)->decrement('stokkg', $detilbeliNow->jumlahkg);
        DB::table('items')->where('id', '=', $detilbeliNow->idbrg)->decrement('stokbrg', $detilbeliNow->jumlahekor);
		DetilBeli::find($id)->delete();

		// calculate grossweight
		$grossweight = 0;
		$detilbelis = DB::table('detilbeli')->where('nobeli', '=', $request->input('nobeli'))->get();
		foreach ($detilbelis as $index => $detilbeli) {
				$grossweight += $detilbeli->jumlahkg;
		}
		
		// calculate micellanous cost 
		$cif = DB::table('beli')->where('nobeli', '=', $request->input('nobeli'))->first()->cif;
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
		//end

		$beli=Beli::where('nobeli', '=', $request->input('nobeli'))
				->update(['storage' => $storage, 'trmc' => $trmc, 'spc' => $spc, 'time' => $time, 'ppn' => $ppn, 'over' => $over]);

   		return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli'));
	}

}
