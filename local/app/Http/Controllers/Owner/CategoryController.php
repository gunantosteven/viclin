<?php namespace App\Http\Controllers\Owner;

use App\Models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use DB;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$categories = DB::table('categories')
            ->where('statusdelete', '=', '0')->get();
        if(Request::input('success') == true)
		{
			$success = true;
		}
		return view('owner.categories.index', compact('categories', 'success'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('owner.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$category=Request::all();
   		Category::create($category);
   		return redirect('owner/categories?success=true');
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
		$category=Category::find($id);
   		return view('owner.categories.show',compact('category'));
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
		$category=Category::find($id);
   		return view('owner.categories.edit',compact('category'));
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
		$categoryUpdate = Request::all();
   		$category=Category::find($id);
   		$category->update($categoryUpdate);
   		return redirect('owner/categories?success=true');
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
		DB::table('categories')
            ->where('id', $id)
            ->update(['statusdelete' => '1']);
   		return redirect('owner/categories');
	}

}
