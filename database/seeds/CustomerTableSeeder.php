<?php

use Illuminate\Database\Seeder;


class CustomersTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel Users
		DB::table('customers')->delete();
		// buat data users
		\App\Models\Customer::create(array(
		'nikcust' => 'a1',
		'namacust' => 'Budi',
		'alamatcust' => 'Kenjeran no. 48',
		'telpcust' => '03155667788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'budibudi@gmail.com',
		'limitcust' => 0
		));
	}
}