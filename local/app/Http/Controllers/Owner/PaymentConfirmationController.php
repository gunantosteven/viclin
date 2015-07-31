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
		$belis = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)
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
		$belis = Beli::where('tglfaktur', '>=', Request::input('tanggalawal'))
    				->where('tglfaktur', '<=', Request::input('tanggalakhir'))
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
		DB::table('beli')
            ->where('nobeli', Request::input('nobeli'))
            ->update(['payment' => 'PAID', 'ketpayment' => Request::input('ketpayment')]);

        $tanggalawal = date('Y-m-d');
    	$tanggalakhir = date('Y-m-d');
		$belis = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)
    				->where('payment', '=', 'UNPAID')->get();
		return view('owner.purchase.paymentconfirmation', compact('belis', 'tanggalawal', 'tanggalakhir'));
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
