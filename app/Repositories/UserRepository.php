<?php

namespace App\Repositories;

use App\Customer\Models\User;
use App\Contracts\UserInterface;
use DB;

class UserRepository implements UserInterface
{
	public $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function getAllUsers()
	{
		try
		{
			return $this->user->with('posts')->get();
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
			
	}

	public function getUserById($id)
	{
		try
		{
			return $this->user->find($id);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
			
	}

	public function createUsers($request)
	{
		DB::beginTransaction();
		try
		{
		   $createUser = $this->user->create($request->all());
			DB::commit();
			return $createUser;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			$e->getMessage();
		}
	} 

	public function updateUsers($id, $request)
	{
		DB::beginTransaction();
		try
		{
			$updateUser = $this->user->find($id)->update([

			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)

		    ]);
			DB::commit();
			return $updateUser;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
		
	}

	public function deleteUsers($id)
	{
		try
		{
			return $this->user->find($id)->delete();
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
			
	    }
	}
}