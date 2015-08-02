<?php namespace App\Http\Controllers\Admin;

use App\Models\Jual;
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
		$juals = Jual::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)
    				->where('payment', '=', 'UNPAID')->get();
		return view('admin.sales.paymentconfirmation', compact('juals', 'tanggalawal', 'tanggalakhir'));
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
    				->where('tglfaktur', '<=', Request::input('tanggalakhir'))
    				->where('payment', '=', 'UNPAID')->get();
    	$tanggalawal = Request::input('tanggalawal');
    	$tanggalakhir = Request::input('tanggalakhir');
    	return view('/admin/sales/paymentconfirmation', compact('juals', 'tanggalawal', 'tanggalakhir'));
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
		$jual = DB::table('jual')
            ->where('nojual', $id)->first();
        $subtotal = DB::table('detiljual')
                     ->select(DB::raw('SUM(hargasatuankg * jumlahekor) as subtotal'))
                     ->where('nojual', '=', $jual->nojual)
                     ->first()->subtotal;
        $totalpayment = $subtotal + $jual->biayaekspjual + $jual->biayastereo - $jual->biayasusutjual;

        if(Request::input('over') != "")
		{
			$over = true;
	   		return view('admin.sales.paymentconfirmationupdate', compact('jual', 'totalpayment', 'over'));
		}

		return view('admin.sales.paymentconfirmationupdate', compact('jual', 'totalpayment'));
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
        	DB::table('jual')
            ->where('nojual', Request::input('nojual'))
            ->update(['payment' => 'UNPAID', 'ketpayment' => Request::input('ketpayment'), 'paymentdate' => Request::input('paymentdate'), 'nominalpayment' => Request::input('nominalpayment')]);
        }
        else if(Request::input('nominalpayment') == Request::input('totalpayment'))
        {
        	DB::table('jual')
            ->where('nojual', Request::input('nojual'))
            ->update(['payment' => 'PAID', 'ketpayment' => Request::input('ketpayment'), 'paymentdate' => Request::input('paymentdate'), 'nominalpayment' => Request::input('nominalpayment')]);
        }
        else
        {
        	return redirect('admin/sales/paymentconfirmation/' . Request::input('nojual') . '?over=true');
        }

		return redirect('admin/sales/paymentconfirmation');
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
