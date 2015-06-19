<?php namespace App\Http\Controllers\Owner;

use App\Models\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Input;
use DB;

class CustomerController extends Controller {

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
			$customers = DB::table('customers')
	        ->where('namacust', 'LIKE', "%$search%")
	        ->orWhere('alamatcust', 'LIKE', "%$search%")
	        ->paginate(30);
		}
		else
		{
			$customers = Customer::paginate(3);
		}
		
		return view('owner.customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('owner.customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$customer=Request::all();
   		Customer::create($customer);
   		return redirect('owner/customers');
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
		$customer=Customer::find($id);
   		return view('owner.customers.show',compact('customer'));
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
		$customer=Customer::find($id);
   		return view('owner.customers.edit',compact('customer'));
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
		$customerUpdate=Request::all();
   		$customer=Customer::find($id);
   		$customer->update($customerUpdate);
   		return redirect('owner/customers');
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
		Customer::find($id)->delete();
   		return redirect('owner/customers');
	}

}
