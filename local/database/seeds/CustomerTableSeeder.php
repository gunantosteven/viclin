<?php

use Illuminate\Database\Seeder;


class CustomersTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel Users
		DB::table('customers')->delete();
		// buat data Customer
		\App\Models\Customer::create(array(
		'namacust' => 'Budi',
		'alamatcust' => 'Kenjeran no. 48',
		'telpcust' => '031335667788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'budibudi@gmail.com',
		'company' => 'UWIKA'
		));

		\App\Models\Customer::create(array(
		'namacust' => 'Bunga',
		'alamatcust' => 'Jatim Park no. 48',
		'telpcust' => '031445667788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'bunga@gmail.com',
		'company' => 'UNESA'
		));

		\App\Models\Customer::create(array(
		'namacust' => 'Ania',
		'alamatcust' => 'Jember no. 48',
		'telpcust' => '03161162788',
		'kotacust' => 'Surabaya',
		'emailcust' => 'ania@gmail.com',
		'company' => 'UBAYA'
		));

		\App\Models\Customer::create(array(
		'namacust' => 'amsyong',
		'alamatcust' => 'Kediri no. 48',
		'telpcust' => '03185668888',
		'kotacust' => 'Surabaya',
		'emailcust' => 'budibudi@gmail.com',
		'company' => 'WM'
		));
	}
}