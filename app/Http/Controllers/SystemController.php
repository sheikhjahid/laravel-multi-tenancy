<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Contracts\UserInterface;
use App\Contracts\PostInterface;
use App\Customer\Models\User;
use Hash;
class SystemController extends Controller
{
    public $userInterface;
    public $postInterface;

    public function __construct(UserInterface $userInterface, PostInterface $postInterface)
    {
        $this->userInterface = $userInterface;
        $this->postInterface = $postInterface;
    }

    public function getUserData($database)
    {
    	return $this->userInterface->getAllUsers();
    }

    public function getUserById($database, $id)
    {
    	return $this->userInterface->getUserById($id);
    }

     public function createCustomers(Request $request)
    {
    
        $createUser = User::create([
            'name'=>'test',
            'email'=>'test@itobuz.com',
            'password'=>Hash::make('123456')
        ]);
        if($createUser)
        {
            return "User created!!";
        }
        else
        {
            return "Unable to create User!!";
        }
    }

    public function updateCustomers($database, $id, UserRequest $request)
    {
        $updateUser = $this->userInterface->updateUsers($id, $request);
        if($updateUser==1)
        {
            return "User updated!!";
        }
        else
        {
            return "Unable to update user!!";
        }
    }

    public function deleteCustomers($database, $id)
    {
        $deleteUser = $this->userInterface->deleteUsers($id);
        if($deleteUser==1)
        {
            return "User deleted!!";
        }
        else
        {
            return "Unable to delete user!!";
        }
    }

    public function getAllPosts($database)
    {
        return $this->postInterface->getAllPosts();
    }

    public function getPostsById($id, $database)
    {
        return $this->postInterface->getPostDataById($id);
    }

}
