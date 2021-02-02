<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\{ UserAddRequest };

class UserController extends Controller
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

    public function index()
    {
    	$users = $this->userRepository->allUsers();
    	return view('partials.public-home', [ 'users' => $users ]);
    }

    public function create()
    {
    	return view('layouts.public-master');
    }

    public function store(UserAddRequest $request)
    {
    	$data = [
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'password' => $request->get('password')
    	];

    	// dd($this->userRepository->create($data));
    	if ($this->userRepository->create($data)) {
    		return redirect('layouts.public-master');
    	}

    	/*
			'name' => $this->faker->name,
			'email' => $this->faker->unique()->safeEmail,
			'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
			'remember_token' => Str::random(10),

    	*/
    }
}
