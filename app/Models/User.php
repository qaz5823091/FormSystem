<?php

namespace App\Models;

use App\Models\Database as DB;

class User
{
	private string $account
	private string $password
	private string $name
	private string $email

	public function __constructor($account, $password, $name, $email)
	{
		$this->account = $account;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
		$this->name = $name;
		$this->email = $email;
	}

	public static function create($account, $password, $name, $email)
	{
		$user = new User($account, $password, $name, $email);
		$user->save();

		return $user;
	}

	public function save()
	{
		$connect = DB::connect();
		$sql = 'INSERT INTO `users`(`account`, `password`, `name`, `email`) VALUES (?, ?, ?, ?)';
		$state = $connect->prepare($sql);
		$state->execute([
			$this->account,
			$this->password,
			$this->name,
			$this->email
		]);
	}
}