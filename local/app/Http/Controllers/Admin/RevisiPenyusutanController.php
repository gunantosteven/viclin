<?php namespace App\Http\Controllers\Admin;

use App\Models\Jual;
use App\Models\DetilJual;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use DB;

class RevisiPenyusutanController extends Controller {

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
		$juals = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->get();
		return view('admin.sales.revisipenyusutan', compact('juals', 'tanggalawal', 'tanggalakhir'));
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function showfaktur()
	{
		//
		$juals = Jual::where('tglorderjual', '>=', Request::input('tanggalawal'))
    				->where('tglorderjual', '<=', Request::input('tanggalakhir'))->get();
    	$tanggalawal = Request::input('tanggalawal');
    	$tanggalakhir = Request::input('tanggalakhir');
    	return view('/admin/sales/revisipenyusutan', compact('juals', 'tanggalawal', 'tanggalakhir'));
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
		DB::table('jual')
            ->where('nojual', Request::input('nojual'))
            ->update(['biayasusutjual' => Request::input('biayasusutjual')]);

        $tanggalawal = date('Y-m-d');
    	$tanggalakhir = date('Y-m-d');
		$juals = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->get();
    	$success = true;
		return view('admin.sales.revisipenyusutan', compact('juals', 'tanggalawal', 'tanggalakhir', 'success'));
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
