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

    Route::resource('/owner/purchase/inputpenyusutan','Owner\InputPenyusutanController');
    Route::resource('/owner/purchase/revisipenyusutan','Owner\RevisiPenyusutanController');

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

    Route::get('/admin/sales/cetakfaktur', [
	    'as' => 'admin.sales.cetakfaktur.index',
	    'uses' => 'Admin\CetakFakturController@index'
	]);
    Route::post('/admin/sales/cetakfaktur', [
	    'as' => 'admin.sales.cetakfaktur.showfaktur',
	    'uses' => 'Admin\CetakFakturController@showfaktur'
	]);
	Route::get('/admin/sales/cetakfaktur/{nojual}', [
	    'as' => 'admin.sales.cetakfaktur.cetak',
	    'uses' => 'Admin\CetakFakturController@cetak'
	]);

	Route::get('/admin/sales/revisifaktur', [
	    'as' => 'admin.sales.revisifaktur.index',
	    'uses' => 'Admin\RevisiFakturController@index'
	]);
    Route::post('/admin/sales/revisifaktur', [
	    'as' => 'admin.sales.revisifaktur.showfaktur',
	    'uses' => 'Admin\RevisiFakturController@showfaktur'
	]);
	Route::get('/admin/sales/revisifaktur/{nojual}', [
	    'as' => 'admin.sales.revisifaktur.edit',
	    'uses' => 'Admin\RevisiFakturController@edit'
	]);
	Route::patch('/admin/sales/revisifaktur/{nojual}', [
	    'as' => 'admin.sales.revisifaktur.update',
	    'uses' => 'Admin\RevisiFakturController@update'
	]);
	Route::resource('/admin/sales/detailrevisifaktur', 'Admin\DetailRevisiFakturController');

    /*Route::resource('/admin/sales/returperfaktur', 'Admin\ReturPerFakturController');
    Route::resource('/admin/sales/detailreturfaktur', 'Admin\DetailReturFakturController');*/

    Route::get('/admin/sales/inputpenyusutan', [
	    'as' => 'admin.sales.inputpenyusutan.index',
	    'uses' => 'Admin\InputPenyusutanController@index'
	]);
    Route::post('/admin/sales/inputpenyusutan', [
	    'as' => 'admin.sales.inputpenyusutan.showfaktur',
	    'uses' => 'Admin\InputPenyusutanController@showfaktur'
	]);
	Route::patch('/admin/sales/inputpenyusutan', [
	    'as' => 'admin.sales.inputpenyusutan.update',
	    'uses' => 'Admin\InputPenyusutanController@update'
	]);

	Route::get('/admin/sales/revisipenyusutan', [
	    'as' => 'admin.sales.revisipenyusutan.index',
	    'uses' => 'Admin\RevisiPenyusutanController@index'
	]);
    Route::post('/admin/sales/revisipenyusutan', [
	    'as' => 'admin.sales.revisipenyusutan.showfaktur',
	    'uses' => 'Admin\RevisiPenyusutanController@showfaktur'
	]);
	Route::patch('/admin/sales/revisipenyusutan', [
	    'as' => 'admin.sales.revisipenyusutan.update',
	    'uses' => 'Admin\RevisiPenyusutanController@update'
	]);

	Route::get('/admin/sales/cetaksuratjalan', [
	    'as' => 'admin.sales.cetaksuratjalan.index',
	    'uses' => 'Admin\CetakSuratJalanController@index'
	]);
    Route::post('/admin/sales/cetaksuratjalan', [
	    'as' => 'admin.sales.cetaksuratjalan.showfaktur',
	    'uses' => 'Admin\CetakSuratJalanController@showfaktur'
	]);
	Route::get('/admin/sales/cetaksuratjalan/{nojual}', [
	    'as' => 'admin.sales.cetaksuratjalan.cetak',
	    'uses' => 'Admin\CetakSuratJalanController@cetak'
	]);

	Route::resource('/admin/biayas', 'Admin\BiayaController');
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
	Schema::create('jual',function($table){
		$table->bigIncrements('id');
		$table->string('nojual',20)->unique();
		$table->bigInteger('nikcust')->unsigned();
		$table->foreign('nikcust')->references('id')->on('customers');
		$table->unsignedInteger('user');
		$table->foreign('user')->references('id')->on('users');
		$table->date('tglorderjual');
		$table->date('tgltempojual');
		$table->float('biayaekspjual');
		$table->float('biayasusutjual');
		$table->float('biayastereo');
		$table->float('kursbaru');
		$table->date('tglfaktur');
		$table->timestamps();
	});
	Schema::create('detiljual',function($table){
		$table->bigIncrements('id');
		$table->string('nojual');
		$table->foreign('nojual')->references('nojual')->on('jual');
		$table->string('kodebrg');
		$table->foreign('kodebrg')->references('kodebrg')->on('items');
		$table->float('hargasatuankg');
		$table->float('jumlahkg');
		$table->bigInteger('jumlahekor');
		$table->string('keterangan');
		$table->timestamps();
	});
	/*Schema::create('returjual',function($table){
		$table->bigIncrements('id');
		$table->string('noreturjual',20)->unique();
		$table->unsignedInteger('user');
		$table->foreign('user')->references('id')->on('users');
		$table->date('tglreturjual');
		$table->timestamps();
	});
	Schema::create('asalreturjual',function($table){
		$table->bigIncrements('id');
		$table->string('noreturjual');
		$table->foreign('noreturjual')->references('noreturjual')->on('returjual');
		$table->string('nojual');
		$table->foreign('nojual')->references('nojual')->on('jual');
		$table->string('kodebrg');
		$table->foreign('kodebrg')->references('kodebrg')->on('items');
		$table->float('hargasatuankgretjual');
		$table->float('jumlahkgretjual');
		$table->bigInteger('jumlahekorretjual');
		$table->string('newsretjual');
		$table->timestamps();
	});*/
	Schema::create('biayas',function($table){
		$table->bigIncrements('id');
		$table->string('biaya');
		$table->date('tgl');
		$table->string('keterangan');
		$table->float('nominal');
		$table->timestamps();
	});
	return "tables has been created";
});

//Route::get('/admin/dashboard', 'Admin\DashboardController@index');


