<?php

use Illuminate\Database\Seeder;


class CategoriesTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel categories
		DB::table('items')->delete();
		DB::table('categories')->delete();
		// buat data category
		\App\Models\Category::create(array(
		'kodekategori' => '1',
		'namakategori' => 'Sea Food'
		));
	}
}