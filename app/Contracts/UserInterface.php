<?php

namespace App\Contracts;

interface UserInterface
{
	public function getAllUsers();

	public function getUserById($id);

	public function createUsers($request);

	public function updateUsers($id, $request);

	public function deleteUsers($id); 
} 