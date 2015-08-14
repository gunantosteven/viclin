<?php namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use DB;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if(Input::has('search'))
		{
			$search = Input::get('search'); 
			$items = DB::table('items')
			->join('categories', 'items.id_category', '=', 'categories.id')
	        ->where('namakategori', 'LIKE', "%$search%")
	        ->orWhere('namabrg', 'LIKE', "%$search%")
	        ->paginate(30);
		}
		else
		{
			$items = Item::paginate(10);
		}
		
		return view('admin.items.index', compact('items'));
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
		$item=Item::find($id);
   		return view('admin.items.show',compact('item'));
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
