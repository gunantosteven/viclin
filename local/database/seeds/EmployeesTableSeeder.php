<?php

use Illuminate\Database\Seeder;


class EmployeesTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel Users
		DB::table('employees')->delete();
		// buat data Customer
		\App\Models\Employee::create(array(
		'namaemp' => 'Bejo',
		'alamatemp' => 'Kenjeran no. 111111',
		'telpemp' => '031335447788',
		'kotaemp' => 'Surabaya',
		'tglmasuk' => '2015-07-07',
		'status' => 'WORKING'
		));

		\App\Models\Employee::create(array(
		'namaemp' => 'Titin',
		'alamatemp' => 'Ken Park no. 111111',
		'telpemp' => '031335447788',
		'kotaemp' => 'Surabaya',
		'tglmasuk' => '2015-06-13',
		'status' => 'RESIGN'
		));
	}
}