<?php namespace App\Http\Controllers\Admin;

use App\Models\Revisi;
use App\Models\DetilJual;
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
			|| $request->input('jumlahekor') == "" || $request->input('noofbox') == "")
		{
			return redirect('admin/sales/revisifaktur/' . $request->input('nojual') . '?validasi=true');
		}
		//validasi stock
		$itemNow = DB::table('items')->where('id', $request->input('idbrg'))->first();
		$jumlahKg = $request->input('jumlahkg');
		$jumlahEkor = $request->input('jumlahekor');
		if($itemNow->stokkg - $jumlahKg < 0 || $itemNow->stokbrg - $jumlahEkor < 0)
		{
			return redirect('admin/sales/revisifaktur/' . $request->input('nojual') . '?checkstock=true');
		}
		//validasi the same item
		$detiljual = DB::table('detiljual')->where('nojual', '=', $request->input('nojual'))->where('idbrg', '=', $request->input('idbrg'))->first();
		if($detiljual != null && $detiljual->idbrg == $request->input('idbrg'))
		{
			return redirect('admin/sales/revisifaktur/' . $request->input('nojual') . '?checkitem=true');
		}


		//insert to table revisi
		$datetoday = date('Y-m-d');
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nojual'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('hargasatuankg'),
				    'keterangan' => 'Add Unit Price Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nojual'),
				    'dataawal' => '',
				    'dataakhir' => DB::table('items')->where('id', $request->input('idbrg'))->first()->kodebrg,
				    'keterangan' => 'Add Item Code',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nojual'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('jumlahkg'),
				    'keterangan' => 'Add Total Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nojual'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('jumlahekor'),
				    'keterangan' => 'Add Total Pcs',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nojual'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('noofbox'),
				    'keterangan' => 'Add No Of Box',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $request->input('nojual'),
				    'dataawal' => '',
				    'dataakhir' => $request->input('keterangan'),
				    'keterangan' => 'Add Information',
				    'status' => 'UNREAD'
		));
		// end insert to revisi

		//
		DB::table('items')->where('id', '=', $request->input('idbrg'))->decrement('stokkg', $request->input('jumlahkg'));
        DB::table('items')->where('id', '=', $request->input('idbrg'))->decrement('stokbrg', $request->input('jumlahekor'));
		DetilJual::create(array(
				    'nojual' => $request->input('nojual'),
				    'idbrg' => $request->input('idbrg'),
				    'hargasatuankg' => $request->input('hargasatuankg'),
				    'jumlahkg' => $request->input('jumlahkg'),
				    'jumlahekor' => $request->input('jumlahekor'),
				    'noofbox' => $request->input('noofbox'),
				    'keterangan' => $request->input('keterangan')
		));
		return redirect('admin/sales/revisifaktur/' . $request->input('nojual'));
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
		$detiljualNow = DB::table('detiljual')->where('id', '=', $id)->first();

		
		//insert to table revisi
		$datetoday = date('Y-m-d');
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detiljualNow->nojual,
				    'dataawal' => $detiljualNow->hargasatuankg,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Unit Price Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detiljualNow->nojual,
				    'dataawal' => DB::table('items')->where('id', $detiljualNow->idbrg)->first()->kodebrg,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Item Code',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detiljualNow->nojual,
				    'dataawal' => $detiljualNow->jumlahkg,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Total Kg',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detiljualNow->nojual,
				    'dataawal' => $detiljualNow->jumlahekor,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Total Pcs',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detiljualNow->nojual,
				    'dataawal' => $detiljualNow->noofbox,
				    'dataakhir' => '',
				    'keterangan' => 'Delete No Of Box',
				    'status' => 'UNREAD'
		));
		Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $detiljualNow->nojual,
				    'dataawal' => $detiljualNow->keterangan,
				    'dataakhir' => '',
				    'keterangan' => 'Delete Information',
				    'status' => 'UNREAD'
		));
		// end insert to revisi

		DB::table('items')->where('id', '=', $detiljualNow->idbrg)->increment('stokkg', $detiljualNow->jumlahkg);
        DB::table('items')->where('id', '=', $detiljualNow->idbrg)->increment('stokbrg', $detiljualNow->jumlahekor);
		DetilJual::find($id)->delete();
   		return redirect('admin/sales/revisifaktur/' . $request->input('nojual'));
	}

}
