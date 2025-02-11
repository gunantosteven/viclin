<?php namespace App\Http\Controllers\Owner;

use App\Models\Revisi;
use App\Models\Beli;
use App\Models\DetilBeli;
use App\Models\Item;
use App\Models\Supplier;
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
		$belis = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)->get();
		return view('/owner/purchase/revisifaktur', compact('belis', 'tanggalawal', 'tanggalakhir'));
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function showfaktur()
	{
		//
		$belis = Beli::where('tglorderbeli', '>=', Request::input('tanggalawal'))
    				->where('tglorderbeli', '<=', Request::input('tanggalakhir'))->get();
    	$tanggalawal = Request::input('tanggalawal');
    	$tanggalakhir = Request::input('tanggalakhir');
    	return view('/owner/purchase/revisifaktur', compact('belis', 'tanggalawal', 'tanggalakhir'));
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
	public function store()
	{
		//
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
	public function edit($nobeli)
	{
		//
		$beli = Beli::where('nobeli', '=', $nobeli)->get()->first();
		$detilbelis = DetilBeli::where('nobeli', '=', $nobeli)->get();
		$items = Item::all();
		$suppliers = Supplier::all();
		if(Request::input('validasi') != "")
		{
			$validasi = true;
	   		return view('/owner/purchase/revisifakturupdate', compact('beli', 'detilbelis', 'items', 'suppliers', 'validasi'));
		}
		else if(Request::input('checkstock') != "")
		{
			$checkstock = true;
	   		return view('/owner/purchase/revisifakturupdate', compact('beli', 'detilbelis', 'items', 'suppliers', 'checkstock'));
		}
		else if(Request::input('checkitem') != "")
		{
			$checkitem = true;
	   		return view('/owner/purchase/revisifakturupdate', compact('beli', 'detilbelis', 'items', 'suppliers', 'checkitem'));
		}
		else if(Request::input('validasidate') != "")
		{
			$validasidate = true;
			return view('/owner/purchase/revisifakturupdate', compact('beli', 'detilbelis', 'items', 'suppliers', 'validasidate'));
		}
		else if(Request::input('success') != "")
		{
			$success = true;
	   		return view('/owner/purchase/revisifakturupdate', compact('beli', 'detilbelis', 'items', 'suppliers', 'success'));
		}

		return view('owner.purchase.revisifakturupdate', compact('beli', 'detilbelis', 'items', 'suppliers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($nobeli)
	{
		//
		// Validasi
		if(Request::input('idsupp') == "" || Request::input('tglorderbeli') == "" || Request::input('tgltempobeli') == "" 
		    || Request::input('biayakarantina') == ""  || Request::input('biayalab') == "" || Request::input('biayafreight') == "")
		{
			return redirect('owner/purchase/revisifaktur/' . $nobeli . '?validasi=true');
		}
		else if(Request::input('tglorderbeli') >  Request::input('tgltempobeli'))
		{
			return redirect('owner/purchase/revisifaktur/' . $nobeli . '?validasidate=true');
		}


		//insert to table revisi
		$beliNow = DB::table('beli')->where('nobeli', '=', $nobeli)->first();
		$datetoday = date('Y-m-d');
		if(Request::input('idsupp') != $beliNow->idsupp)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nobeli,
				    'dataawal' => DB::table('suppliers')->where('id', '=', $beliNow->idsupp)->first()->namasupp,
				    'dataakhir' => DB::table('suppliers')->where('id', '=', Request::input('idsupp'))->first()->namasupp,
				    'keterangan' => 'Update Customer',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('tglorderbeli') != $beliNow->tglorderbeli)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nobeli,
				    'dataawal' => $beliNow->tglorderbeli,
				    'dataakhir' => Request::input('tglorderbeli'),
				    'keterangan' => 'Update Date Purchase Order',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('tgltempobeli') != $beliNow->tgltempobeli)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nobeli,
				    'dataawal' => $beliNow->tgltempobeli,
				    'dataakhir' => Request::input('tgltempobeli'),
				    'keterangan' => 'Update Due Date',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('biayakarantina') != $beliNow->biayakarantina)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nobeli,
				    'dataawal' => $beliNow->biayakarantina,
				    'dataakhir' => Request::input('biayakarantina'),
				    'keterangan' => 'Update Quarantine Cost',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('biayalab') != $beliNow->biayalab)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nobeli,
				    'dataawal' => $beliNow->biayalab,
				    'dataakhir' => Request::input('biayalab'),
				    'keterangan' => 'Update Lab Cost',
				    'status' => 'UNREAD'
			));
		}
		if(Request::input('biayafreight') != $beliNow->biayafreight)
		{
			Revisi::create(array(
				    'user' => Auth::user()->id,
				    'tglrevisi' => $datetoday,
				    'jualbeli' => $nobeli,
				    'dataawal' => $beliNow->biayafreight,
				    'dataakhir' => Request::input('biayafreight'),
				    'keterangan' => 'Update Freight Cost',
				    'status' => 'UNREAD'
			));
		}
		// end to revisi
		

		//
		$beliUpdate=Request::all();
   		$beli=Beli::where('nobeli', '=', $nobeli)->get()->first();
   		$beli->update($beliUpdate);
		
		// calculate bm and pph if cif changed
		if(Request::input('cif') != $beliNow->cif)
		{
			$cif = Request::input('cif');
			$bm = $cif * 0.05;
			$pph = ($bm+$cif) * 0.025;

			$beli=Beli::where('nobeli', '=', $nobeli)
					->update(['bm' => $bm, 'pph' => $pph]);
		}
		


   		return redirect('owner/purchase/revisifaktur/' . $nobeli . '?success=true');
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
