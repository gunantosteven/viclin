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
		'namakategori' => 'Kepiting'
		));

		\App\Models\Category::create(array(
		'kodekategori' => '2',
		'namakategori' => 'Cumi'
		));

		\App\Models\Category::create(array(
		'kodekategori' => '3',
		'namakategori' => 'Udang'
		));

		\App\Models\Category::create(array(
		'kodekategori' => '4',
		'namakategori' => 'Gurami'
		));
	}
}