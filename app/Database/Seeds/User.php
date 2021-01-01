<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
	public function run()
	{
		$username = 18101213100;
		$a = 'pamulang';
		$password = 0101010;
		// for ($i = 0; $i < 100; $i++) {

		$data = [
			'email'     => $username . "@gmail.com",
			'username'  => $username,
			'password_hash' => $passwordHash = password_hash('pamulang123', PASSWORD_DEFAULT),
			'active' => 1
		];

		$this->db->table('users')->insert($data);
		// $password++;
		// $username++;
		// }

		Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed explicabo alias dolore laudantium omnis fugiat.
	}
}
