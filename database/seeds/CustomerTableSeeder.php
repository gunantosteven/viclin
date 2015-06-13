<?php

use Illuminate\Database\Seeder;


class CustomersTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel Users
		DB::table('customers')->delete();
		// buat data Customer
		\App\Models\Customer::create(array(
		'nikcust' => 'a1',
		'namacust' => 'Budi',
		'alamatcust' => 'Kenjeran no. 48',
		'telpcust' => '031335667788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'budibudi@gmail.com',
		'limitcust' => 0
		));

		\App\Models\Customer::create(array(
		'nikcust' => 'a2',
		'namacust' => 'Bunga',
		'alamatcust' => 'Jatim Park no. 48',
		'telpcust' => '031445667788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'bunga@gmail.com',
		'limitcust' => 0
		));

		\App\Models\Customer::create(array(
		'nikcust' => 'a3',
		'namacust' => 'Ania',
		'alamatcust' => 'Jember no. 48',
		'telpcust' => '03161162788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'ania@gmail.com',
		'limitcust' => 0
		));

		\App\Models\Customer::create(array(
		'nikcust' => 'a4',
		'namacust' => 'amsyong',
		'alamatcust' => 'Kediri no. 48',
		'telpcust' => '03185668888',
		'kotacust' => 'Surabaya',
		'emailcust' => 'budibudi@gmail.com',
		'limitcust' => 0
		));
	}
}