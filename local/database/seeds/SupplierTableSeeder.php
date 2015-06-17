<?php

use Illuminate\Database\Seeder;


class SuppliersTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel Users
		DB::table('suppliers')->delete();
		// buat data users
		\App\Models\Supplier::create(array(
		'niksupp' => 's1',
		'namasupp' => 'Andre',
		'alamatsupp' => 'Jagalan no. 48',
		'telpsupp' => '03111223344',
		'kotasupp' => 'Surabaya',
		'emailsupp' => 'andre@gmail.com'
		));
	}
}