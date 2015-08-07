<?php namespace App\Http\Controllers\Admin\Setting;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
use Hash;

class ChangePasswordController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if(Request::input('success') != "")
		{
			$success=true;
			return view('admin.setting.changepassword', compact('success'));
		}
		else if(Request::input('error') != "")
		{
			$error=true;
			return view('admin.setting.changepassword', compact('error'));
		}
		return view('admin.setting.changepassword');
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
		// authenticated user
		if(Request::input('new_password') == Request::input('new_password2'))
		{
			$new_password = Request::input('new_password');
			$user = Auth::user();
			$user->password = Hash::make($new_password);
			// finally we save the authenticated user
			$user->save();
	   		return redirect('admin/setting/changepassword?success=true');
		}
		
		// finally we save the authenticated user
   		return redirect('admin/setting/changepassword?error=true');

		
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
