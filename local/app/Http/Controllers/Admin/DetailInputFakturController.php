<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

class DetailInputFakturController extends Controller {



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
		$id = count(Session::get('salesitems'));
		Session::push('salesitems', [
          'kodebrg' => $request->input('kodebrg'),
          'hargasatuankg' => $request->input('hargasatuankg'),
          'jumlahkg' => $request->input('jumlahkg'),
          'jumlahekor' => $request->input('jumlahekor'),
          'keterangan' => $request->input('keterangan'),
          'id' => $id
      	]);
		return redirect('admin/sales/inputfaktur');
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
	public function destroy($id)
	{
		//
		if($id == -1)
		{
			Session::forget('salesitems');

			return redirect('admin/sales/inputfaktur');
		}

		$salesitems = Session::get('salesitems');
		foreach ($salesitems as $index => $item) {
			if ($item['id'] == $id) {
		    	unset($salesitems[$index]);
		    }
		}
		
		session(['salesitems' => $salesitems]);

		return redirect('admin/sales/inputfaktur');
	}

}
