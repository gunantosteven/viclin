<?php

use Illuminate\Database\Seeder;


class ItemsTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel items
		DB::table('items')->delete();
		$category = DB::table('categories')->where('namakategori', 'Sea Food')->first();
		// buat data Item
		\App\Models\Item::create(array(
			'kodebrg' => '1',
			'id_category' => $category->id,
			'namabrg' => 'Kepiting Live Food',
			'stokkg' => 2,
			'status' => 'Live Food',
			'stokbrg' => 10
		));

		\App\Models\Item::create(array(
			'kodebrg' => '2',
			'id_category' => $category->id,
			'namabrg' => 'Cumi Frozen Food',
			'stokkg' => 1,
			'status' => 'Frozen Food',
			'stokbrg' => 5
		));
	}
}