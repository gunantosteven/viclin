<?php namespace App\Http\Controllers\Owner;

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
		$id = count(Session::get('purchaseitems'));
		Session::push('purchaseitems', [
          'kodebrg' => $request->input('kodebrg'),
          'hargabeli' => $request->input('hargabeli'),
          'jumlahkg' => $request->input('jumlahkg'),
          'status' => $request->input('status'),
          'id' => $id
      	]);
		return redirect('owner/purchase/inputfaktur');
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
			Session::forget('purchaseitems');

			return redirect('owner/purchase/inputfaktur');
		}

		$purchaseitems = Session::get('purchaseitems');
		foreach ($purchaseitems as $index => $item) {
			if ($item['id'] == $id) {
		    	unset($purchaseitems[$index]);
		    }
		}
		
		session(['purchaseitems' => $purchaseitems]);

		return redirect('owner/purchase/inputfaktur');
	}

}
