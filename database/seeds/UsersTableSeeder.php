<?php

use Illuminate\Database\Seeder;


class UsersTableSeederTableSeeder extends Seeder {
	public function run()
	{
		// kosongkan data tabel Users
		DB::table('users')->delete();
		// buat data users
		\App\Models\User::create(array(
		'username' => 'admin',
		'password' => Hash::make('admin'),
		'namauser' => 'superuser',
		));

		\App\Models\User::create(array(
		'username' => 'owner',
		'password' => Hash::make('owner'),
		'namauser' => 'owner',
		));
	}
}