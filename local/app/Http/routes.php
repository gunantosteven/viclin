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

    Route::resource('/owner/categories','Owner\CategoryController');
    Route::resource('/owner/items','Owner\ItemController');
    Route::resource('/owner/customers','Owner\CustomerController');
    Route::resource('/owner/suppliers','Owner\SupplierController');
    Route::resource('/owner/stock','Owner\StockController');

    Route::get('/owner/history/revisisales', [
	    'as' => 'owner.history.revisisales.index',
	    'uses' => 'Owner\HistoryRevisiSalesController@index'
	]);
    Route::post('/owner/history/revisisales', [
	    'as' => 'owner.history.revisisales.showfaktur',
	    'uses' => 'Owner\HistoryRevisiSalesController@showfaktur'
	]);
    Route::get('/owner/history/revisipurchase', [
	    'as' => 'owner.history.revisipurchase.index',
	    'uses' => 'Owner\HistoryRevisiPurchaseController@index'
	]);
    Route::post('/owner/history/revisipurchase', [
	    'as' => 'owner.history.revisipurchase.showfaktur',
	    'uses' => 'Owner\HistoryRevisiPurchaseController@showfaktur'
	]);

    Route::resource('/owner/purchase/inputfaktur', 'Owner\InputFakturController');
    Route::resource('/owner/purchase/detailinputfaktur', 'Owner\DetailInputFakturController');

    Route::get('/owner/purchase/revisifaktur', [
	    'as' => 'owner.purchase.revisifaktur.index',
	    'uses' => 'Owner\RevisiFakturController@index'
	]);
    Route::post('/owner/purchase/revisifaktur', [
	    'as' => 'owner.purchase.revisifaktur.showfaktur',
	    'uses' => 'Owner\RevisiFakturController@showfaktur'
	]);
	Route::get('/owner/purchase/revisifaktur/{nojual}', [
	    'as' => 'owner.purchase.revisifaktur.edit',
	    'uses' => 'Owner\RevisiFakturController@edit'
	]);
	Route::patch('/owner/purchase/revisifaktur/{nojual}', [
	    'as' => 'owner.purchase.revisifaktur.update',
	    'uses' => 'Owner\RevisiFakturController@update'
	]);
	Route::resource('/owner/purchase/detailrevisifaktur', 'Owner\DetailRevisiFakturController');

    /*Route::resource('/owner/purchase/returperfaktur', 'Owner\ReturPerFakturController');*/

    Route::get('/owner/purchase/paymentconfirmation', [
	    'as' => 'owner.purchase.paymentconfirmation.index',
	    'uses' => 'Owner\PaymentConfirmationController@index'
	]);
    Route::post('/owner/purchase/paymentconfirmation', [
	    'as' => 'owner.purchase.paymentconfirmation.showfaktur',
	    'uses' => 'Owner\PaymentConfirmationController@showfaktur'
	]);
	Route::get('/owner/purchase/paymentconfirmation/{nobeli}', [
	    'as' => 'owner.purchase.paymentconfirmation.edit',
	    'uses' => 'Owner\PaymentConfirmationController@edit'
	]);
	Route::patch('/owner/purchase/paymentconfirmation', [
	    'as' => 'owner.purchase.paymentconfirmation.update',
	    'uses' => 'Owner\PaymentConfirmationController@update'
	]);

    Route::get('/owner/purchase/inputpenyusutan', [
	    'as' => 'owner.purchase.inputpenyusutan.index',
	    'uses' => 'Owner\InputPenyusutanController@index'
	]);
    Route::post('/owner/purchase/inputpenyusutan', [
	    'as' => 'owner.purchase.inputpenyusutan.showfaktur',
	    'uses' => 'Owner\InputPenyusutanController@showfaktur'
	]);
	Route::patch('/owner/purchase/inputpenyusutan', [
	    'as' => 'owner.purchase.inputpenyusutan.update',
	    'uses' => 'Owner\InputPenyusutanController@update'
	]);

	Route::get('/owner/purchase/revisipenyusutan', [
	    'as' => 'owner.purchase.revisipenyusutan.index',
	    'uses' => 'Owner\RevisiPenyusutanController@index'
	]);
    Route::post('/owner/purchase/revisipenyusutan', [
	    'as' => 'owner.purchase.revisipenyusutan.showfaktur',
	    'uses' => 'Owner\RevisiPenyusutanController@showfaktur'
	]);
	Route::patch('/owner/purchase/revisipenyusutan', [
	    'as' => 'owner.purchase.revisipenyusutan.update',
	    'uses' => 'Owner\RevisiPenyusutanController@update'
	]);

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
    Route::resource('/admin/employees','Admin\EmployeeController');

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

    Route::get('/admin/sales/paymentconfirmation', [
	    'as' => 'admin.sales.paymentconfirmation.index',
	    'uses' => 'Admin\PaymentConfirmationController@index'
	]);
    Route::post('/admin/sales/paymentconfirmation', [
	    'as' => 'admin.sales.paymentconfirmation.showfaktur',
	    'uses' => 'Admin\PaymentConfirmationController@showfaktur'
	]);
	Route::get('/admin/sales/paymentconfirmation/{nojual}', [
	    'as' => 'admin.sales.paymentconfirmation.edit',
	    'uses' => 'Admin\PaymentConfirmationController@edit'
	]);
	Route::patch('/admin/sales/paymentconfirmation', [
	    'as' => 'admin.sales.paymentconfirmation.update',
	    'uses' => 'Admin\PaymentConfirmationController@update'
	]);

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

	Route::resource('/admin/costs', 'Admin\CostController');
	Route::resource('/admin/salaries', 'Admin\SalaryController');
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
		$table->string('alamatcust',100);
		$table->string('telpcust',20);
		$table->string('kotacust', 20);
		$table->string('emailcust',30);
		$table->string('company',30);
		$table->timestamps();
	});
	Schema::create('suppliers',function($table){
		$table->bigIncrements('id');
		$table->string('niksupp',30)->unique();
		$table->string('namasupp',30);
		$table->string('alamatsupp',100);
		$table->string('telpsupp',20);
		$table->string('kotasupp', 20);
		$table->string('emailsupp',30);
		$table->timestamps();
	});
	Schema::create('employees',function($table){
		$table->bigIncrements('id');
		$table->string('namaemp',30);
		$table->string('alamatemp',100);
		$table->string('telpemp',20);
		$table->string('kotaemp', 20);
		$table->date('tglmasuk');
		$table->string('status', 20);
		$table->timestamps();
	});
	Schema::create('categories',function($table){
		$table->increments('id');
		$table->string('kodekategori',10)->unique();
		$table->string('namakategori',60);
		$table->string('statusdelete',10)->default('0');
		$table->timestamps();
	});
	Schema::create('items',function($table){
		$table->bigIncrements('id');
		$table->string('kodebrg',20)->unique();
		$table->unsignedInteger('id_category');
		$table->foreign('id_category')->references('id')->on('categories');
		$table->string('namabrg',30);
		$table->float('stokkg', 13);
		$table->string('status',20);
		$table->bigInteger('stokbrg');
		$table->timestamps();
	});
	Schema::create('beli',function($table){
		$table->bigIncrements('id');
		$table->string('nobeli',30)->unique();
		$table->bigInteger('idsupp')->unsigned();
		$table->foreign('idsupp')->references('id')->on('suppliers');
		$table->unsignedInteger('user');
		$table->foreign('user')->references('id')->on('users');
		$table->string('payment',20)->default('UNPAID');
		$table->string('ketpayment');
		$table->date('paymentdate');
		$table->float('nominalpayment', 13);
		$table->date('tglorderbeli');
		$table->date('tgltempobeli');
		$table->float('biayasusutbeli', 13);
		$table->float('biayakarantina', 13);
		$table->float('biayalab', 13);
		$table->float('biayafreight', 13);
		$table->float('cif', 13);
		$table->float('bm', 13);
		$table->float('pph', 13);
		$table->float('storage', 13);
		$table->float('trmc', 13);
		$table->float('spc', 13);
		$table->float('time', 13);
		$table->float('dokumen', 13);
		$table->float('ppn', 13);
		$table->float('stamp', 13);
		$table->float('handling', 13);
		$table->float('over', 13);
		$table->float('adm', 13);
		$table->float('edi', 13);
		$table->float('rush', 13);
		$table->date('tglfaktur');
		$table->timestamps();
	});
	Schema::create('detilbeli',function($table){
		$table->bigIncrements('id');
		$table->string('nobeli');
		$table->foreign('nobeli')->references('nobeli')->on('beli');
		$table->string('kodebrg');
		$table->foreign('kodebrg')->references('kodebrg')->on('items');
		$table->float('hargasatuankg', 13);
		$table->float('jumlahkg', 13);
		$table->bigInteger('jumlahekor');
		$table->string('keterangan');
		$table->timestamps();
	});
	Schema::create('jual',function($table){
		$table->bigIncrements('id');
		$table->string('nojual',30)->unique();
		$table->bigInteger('nikcust')->unsigned();
		$table->foreign('nikcust')->references('id')->on('customers');
		$table->unsignedInteger('user');
		$table->foreign('user')->references('id')->on('users');
		$table->string('payment',20)->default('UNPAID');
		$table->string('ketpayment');
		$table->date('paymentdate');
		$table->float('nominalpayment', 13);
		$table->date('tglorderjual');
		$table->date('tgltempojual');
		$table->date('deliverydate');
		$table->float('biayaekspjual', 13);
		$table->float('biayasusutjual', 13);
		$table->float('biayastereo', 13);
		$table->float('kursbaru', 13);
		$table->date('tglfaktur');
		$table->timestamps();
	});
	Schema::create('detiljual',function($table){
		$table->bigIncrements('id');
		$table->string('nojual');
		$table->foreign('nojual')->references('nojual')->on('jual');
		$table->string('kodebrg');
		$table->foreign('kodebrg')->references('kodebrg')->on('items');
		$table->float('hargasatuankg', 13);
		$table->float('jumlahkg', 13);
		$table->bigInteger('jumlahekor');
		$table->string('noofbox');
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
		$table->float('nominal', 13);
		$table->timestamps();
	});
	Schema::create('salaries',function($table){
		$table->bigIncrements('id');
		$table->bigInteger('idemp')->unsigned();
		$table->foreign('idemp')->references('id')->on('employees');
		$table->date('tgltransaksi');
		$table->string('bulan');
		$table->string('tahun');
		$table->string('keterangan');
		$table->float('nominal', 13);
		$table->timestamps();
	});
	Schema::create('revisi',function($table){
		$table->bigIncrements('id');
		$table->unsignedInteger('user');
		$table->foreign('user')->references('id')->on('users');
		$table->date('tglrevisi');
		$table->string('jualbeli');
		$table->string('dataawal');
		$table->string('dataakhir');
		$table->string('keterangan');
		$table->timestamps();
	});
	return "tables has been created";
});

//Route::get('/admin/dashboard', 'Admin\DashboardController@index');


