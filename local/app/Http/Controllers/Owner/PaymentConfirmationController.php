<?php namespace App\Http\Controllers\Owner;

use App\Models\Beli;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use DB;

class PaymentConfirmationController extends Controller {

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
    				->where('tglorderbeli', '<=', $tanggalakhir)
    				->where('payment', '=', 'UNPAID')->get();
		return view('owner.purchase.paymentconfirmation', compact('belis', 'tanggalawal', 'tanggalakhir'));
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
    				->where('tglorderbeli', '<=', Request::input('tanggalakhir'))
    				->where('payment', '=', 'UNPAID')->get();
    	$tanggalawal = Request::input('tanggalawal');
    	$tanggalakhir = Request::input('tanggalakhir');
    	return view('/owner/purchase/paymentconfirmation', compact('belis', 'tanggalawal', 'tanggalakhir'));
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
	public function edit($id)
	{
		//
		$beli = DB::table('beli')
            ->where('nobeli', $id)->first();
        $subtotal = DB::table('detilbeli')
                     ->select(DB::raw('SUM(hargasatuankg * jumlahekor) as subtotal'))
                     ->where('nobeli', '=', $beli->nobeli)
                     ->first()->subtotal;
        $micellanous = $beli->bm+$beli->pph+$beli->storage+$beli->trmc+$beli->spc+$beli->time+$beli->dokumen+$beli->ppn+$beli->stamp;
        $handling = $beli->handling+$beli->over+$beli->adm+$beli->edi+$beli->rush;
        $totalpayment = $subtotal + $beli->biayakarantina + $beli->biayalab + $beli->biayafreight + $micellanous + $handling - $beli->biayasusutbeli;

        if(Request::input('over') != "")
		{
			$over = true;
	   		return view('owner.purchase.paymentconfirmationupdate', compact('beli', 'totalpayment', 'over'));
		}

		return view('owner.purchase.paymentconfirmationupdate', compact('beli', 'totalpayment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		//
        if(Request::input('nominalpayment') < Request::input('totalpayment'))
        {
        	DB::table('beli')
            ->where('nobeli', Request::input('nobeli'))
            ->update(['payment' => 'UNPAID', 'ketpayment' => Request::input('ketpayment'), 'paymentdate' => Request::input('paymentdate'), 'nominalpayment' => Request::input('nominalpayment')]);
        }
        else if(Request::input('nominalpayment') == Request::input('totalpayment'))
        {
        	DB::table('beli')
            ->where('nobeli', Request::input('nobeli'))
            ->update(['payment' => 'PAID', 'ketpayment' => Request::input('ketpayment'), 'paymentdate' => Request::input('paymentdate'), 'nominalpayment' => Request::input('nominalpayment')]);
        }
        else
        {
        	return redirect('owner/purchase/paymentconfirmation/' . Request::input('nobeli') . '?over=true');
        }

		return redirect('owner/purchase/paymentconfirmation');
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
