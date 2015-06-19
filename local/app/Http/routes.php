<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'owner'], function()
{
    Route::get('/owner', function()
    {
        // can only access this if type == O
    });

    Route::get('/owner/dashboard', 'Owner\DashboardController@index');

    Route::resource('/owner/items','Owner\ItemController');
    Route::resource('/owner/customers','Owner\CustomerController');
    Route::resource('/owner/suppliers','Owner\SupplierController');
    Route::resource('/owner/stock','Owner\StockController');

    Route::resource('/owner/history/revisisales','Owner\RevisiHistorySalesController');
    Route::resource('/owner/history/revisipurchase','Owner\RevisiHistoryPurchaseController');

    Route::resource('/owner/history/retursales','Owner\ReturHistorySalesController');
    Route::resource('/owner/history/returpurchase','Owner\ReturHistoryPurchaseController');

    Route::resource('/owner/purchase/inputfaktur', 'Owner\InputFakturController');
    Route::resource('/owner/purchase/detailinputfaktur', 'Owner\DetailInputFakturController');
    Route::resource('/owner/purchase/revisifaktur', 'Owner\RevisiFakturController');
    Route::resource('/owner/purchase/returperfaktur', 'Owner\ReturPerFakturController');

    Route::resource('/owner/penyusutan','Owner\PenyusutanController');

    Route::resource('/owner/report/salesperiod','Owner\Report\SalesPeriodController');
    Route::resource('/owner/report/purchaseperiod','Owner\Report\PurchasePeriodController');
    Route::resource('/owner/report/profitandlossperiod','Owner\Report\ProfitAndLossPeriodController');
});

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/admin', function()
    {
        // can only access this if type == A
    });

    Route::get('/admin/dashboard', 'Admin\DashboardController@index');

    

    Route::resource('/admin/customers','Admin\CustomerController');
    Route::resource('/admin/items','Admin\ItemController');

    Route::resource('/admin/sales/inputfaktur', 'Admin\InputFakturController');
    Route::resource('/admin/sales/detailinputfaktur', 'Admin\DetailInputFakturController');
    Route::resource('/admin/sales/cetakfaktur', 'Admin\CetakFakturController');
    Route::resource('/admin/sales/revisifaktur', 'Admin\RevisiFakturController');
    Route::resource('/admin/sales/returperfaktur', 'Admin\ReturPerFakturController');

    Route::resource('/admin/sales/inputpenyusutan','Admin\InputPenyusutanController');
    Route::resource('/admin/sales/revisipenyusutan','Admin\RevisiPenyusutanController');

    Route::resource('/admin/cetak/suratjalan','Admin\Cetak\SuratJalanController');

});


Route::get('createdb',function(){
	Schema::create('users',function($table){
		$table->increments('id');
		$table->string('username',32);
		$table->string('password',60);
		$table->string('namauser',30);
		$table->string('role', 30);
		$table->string('remember_token',60);
		$table->timestamps();
	});
	Schema::create('customers',function($table){
		$table->bigIncrements('id');
		$table->string('namacust',30);
		$table->string('alamatcust',30);
		$table->string('telpcust',20);
		$table->string('kotacust', 20);
		$table->string('emailcust',30);
		$table->float('limitcust');
		$table->timestamps();
	});
	Schema::create('suppliers',function($table){
		$table->bigIncrements('id');
		$table->string('niksupp',30)->unique();
		$table->string('namasupp',30);
		$table->string('alamatsupp',30);
		$table->string('telpsupp',20);
		$table->string('kotasupp', 20);
		$table->string('emailsupp',30);
		$table->timestamps();
	});
	Schema::create('categories',function($table){
		$table->increments('id');
		$table->string('kodekategori',10)->unique();
		$table->string('namakategori',60);
		$table->timestamps();
	});
	Schema::create('items',function($table){
		$table->bigIncrements('id');
		$table->string('kodebrg',20)->unique();
		$table->unsignedInteger('id_category');
		$table->foreign('id_category')->references('id')->on('categories');
		$table->string('namabrg',30);
		$table->float('stokkg');
		$table->string('status',20);
		$table->float('stokbrg');
		$table->timestamps();
	});
	return "tables has been created";
});

//Route::get('/admin/dashboard', 'Admin\DashboardController@index');


