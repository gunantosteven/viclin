<?php namespace App\Http\Controllers\Admin;

use App\Models\DetilJual;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

use DB;

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
			return redirect('admin/sales/revisifaktur/' . $request->input('nojual') . '?validasi=true');
		}
		//validasi stock
		$itemNow = DB::table('items')->where('kodebrg', $request->input('kodebrg'))->first();
		$jumlahKg = $request->input('jumlahkg');
		$jumlahEkor = $request->input('jumlahekor');
		if($itemNow->stokkg - $jumlahKg < 0 || $itemNow->stokbrg - $jumlahEkor < 0)
		{
			return redirect('admin/sales/revisifaktur/' . $request->input('nojual') . '?checkstock=true');
		}
		//validasi the same item
		$detiljual = DB::table('detiljual')->where('nojual', '=', $request->input('nojual'))->where('kodebrg', '=', $request->input('kodebrg'))->first();
		if($detiljual != null && $detiljual->kodebrg == $request->input('kodebrg'))
		{
			return redirect('admin/sales/revisifaktur/' . $request->input('nojual') . '?checkitem=true');
		}

		//
		DB::table('items')->where('kodebrg', '=', $request->input('kodebrg'))->decrement('stokkg', $request->input('jumlahkg'));
        DB::table('items')->where('kodebrg', '=', $request->input('kodebrg'))->decrement('stokbrg', $request->input('jumlahekor'));
		DetilJual::create(array(
				    'nojual' => $request->input('nojual'),
				    'kodebrg' => $request->input('kodebrg'),
				    'hargasatuankg' => $request->input('hargasatuankg'),
				    'jumlahkg' => $request->input('jumlahkg'),
				    'jumlahekor' => $request->input('jumlahekor'),
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
		DB::table('items')->where('kodebrg', '=', $detiljualNow->kodebrg)->increment('stokkg', $detiljualNow->jumlahkg);
        DB::table('items')->where('kodebrg', '=', $detiljualNow->kodebrg)->increment('stokbrg', $detiljualNow->jumlahekor);
		DetilJual::find($id)->delete();
   		return redirect('admin/sales/revisifaktur/' . $request->input('nojual'));
	}

}
