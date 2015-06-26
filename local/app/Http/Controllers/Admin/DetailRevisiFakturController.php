<?php namespace App\Http\Controllers\Admin;

use App\Models\DetilJual;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

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
		//
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
		DetilJual::find($id)->delete();
   		return redirect('admin/sales/revisifaktur/' . $request->input('nojual'));
	}

}
