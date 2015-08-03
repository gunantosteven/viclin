<?php namespace App\Http\Controllers\Owner;

use App\Models\Category;
use App\Models\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$items = Item::all();
		if(Request::input('success') == true)
		{
			$success = true;
		}
		return view('owner.items.index', compact('items', 'success'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$categories = Category::all();
		return view('owner.items.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$item=Request::all();
   		Item::create($item);
   		return redirect('owner/items?success=true');
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
   		return view('owner.items.show',compact('item'));
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
		$item=Item::find($id);
		$categories = Category::all();
   		return view('owner.items.edit',compact('item', 'categories'));
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
		$itemUpdate = Request::all();
   		$item=Item::find($id);
   		$item->update($itemUpdate);
   		return redirect('owner/items?success=true');
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
		Item::find($id)->delete();
   		return redirect('owner/items');
	}

}
