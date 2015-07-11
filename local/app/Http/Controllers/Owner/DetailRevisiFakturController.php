<?php namespace App\Http\Controllers\Owner;

use App\Models\Revisi;
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
		if($request->input('kodebrg') == "" || $request->input('hargasatuankg') == "" || $request->input('jumlahkg') == "" 
			|| $request->input('jumlahekor') == "" || $request->input('keterangan') == "")
		{
			return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli') . '?validasi=true');
		}
		//validasi the same item
		$detilbeli = DB::table('detilbeli')->where('nobeli', '=', $request->input('nobeli'))->where('kodebrg', '=', $request->input('kodebrg'))->first();
		if($detilbeli != null && $detilbeli->kodebrg == $request->input('kodebrg'))
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
				    'dataakhir' => $request->input('kodebrg'),
				    'keterangan' => 'Unit Price Kg'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('hargasatuankg'),
				    'keterangan' => 'Item Code'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('jumlahkg'),
				    'keterangan' => 'Total Kg'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('jumlahekor'),
				    'keterangan' => 'Total Tail'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nobeli'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('keterangan'),
				    'keterangan' => 'Information'
		));
		// end insert to revisi

		//
		DB::table('items')->where('kodebrg', '=', $request->input('kodebrg'))->increment('stokkg', $request->input('jumlahkg'));
        DB::table('items')->where('kodebrg', '=', $request->input('kodebrg'))->increment('stokbrg', $request->input('jumlahekor'));
		DetilBeli::create(array(
				    'nobeli' => $request->input('nobeli'),
				    'kodebrg' => $request->input('kodebrg'),
				    'hargasatuankg' => $request->input('hargasatuankg'),
				    'jumlahkg' => $request->input('jumlahkg'),
				    'jumlahekor' => $request->input('jumlahekor'),
				    'keterangan' => $request->input('keterangan')
		));
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
		$itemNow = DB::table('items')->where('kodebrg', $detilbeliNow->kodebrg)->first();
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
				    'dataawal' => $detilbeliNow->hargasatuankg,
				    'dataakhir' => '',
				    'keterangan' => 'Unit Price Kg'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->kodebrg,
				    'dataakhir' => '',
				    'keterangan' => 'Item Code'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->jumlahkg,
				    'dataakhir' => '',
				    'keterangan' => 'Total Kg'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->jumlahekor,
				    'dataakhir' => '',
				    'keterangan' => 'Total Tail'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detilbeliNow->nobeli,
				    'dataawal' => $detilbeliNow->keterangan,
				    'dataakhir' => '',
				    'keterangan' => 'Information'
		));
		// end insert to revisi

		DB::table('items')->where('kodebrg', '=', $detilbeliNow->kodebrg)->decrement('stokkg', $detilbeliNow->jumlahkg);
        DB::table('items')->where('kodebrg', '=', $detilbeliNow->kodebrg)->decrement('stokbrg', $detilbeliNow->jumlahekor);
		DetilBeli::find($id)->delete();
   		return redirect('owner/purchase/revisifaktur/' . $request->input('nobeli'));
	}

}
