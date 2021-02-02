<?php

namespace App\Http\Repositories;
use App\Models\User;

class UserRepository
{
	public function allUsers()
	{
		// return User::get();
		// return User::all();
		// return User::where('id', '>=', 4)->get();
		return User::where('id', '>=', 4)->with('profile')->get();
	}

	public function create($data)
	{
		return User::create($data);
	}
}