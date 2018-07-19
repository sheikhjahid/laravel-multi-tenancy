<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer\Models\User;
use App\Customer\Models\Post;
use App\System\Models\User as SystemUser;
use App\System\Models\Website as SystemWebsite;
use DB;
use Config;
use Hash;

class SystemController extends Controller
{
    public function getUserData()
    {
    	return SystemUser::all();
    }

    public function getUserById($id)
    {
    	return SystemUser::find($id);
    }

    public function getWebsiteData()
    {
       return SystemWebsite::getWebsiteData();
    }

    public function getTenantData($database)
    {
       
         return User::with('posts')->get();
       
    } 

    public function deleteTenantData($database, $id)
    {
        
         $deleteData = User::find($id)->delete();
         if($deleteData==1)
         {
            return "deleted Tenant";
         }
         else
         {
            return "Unable to delete tenant!!";
         }
       
        
    }

    public function getSpecificCustomerData($database, $id)
    {
      
           $getUserData = User::find($id);
           return $getUserData;

    }

    public function getUserByPost($database, $id)
    {

        $getPostData = Post::find($id);
        
        $getUserId = $getPostData->user_id;
        
        $getUserData = User::find($getUserId);

        return $getUserData;
       
    }

    public function createCustomers($database, Request $request)
    {
        $data = [$request->name, $request->email, $request->password];

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) 

        ]);

        return "User Created!!";
    }

    public function getPostData($database)
    {
        return Post::all();
    }

    public function deletePosts($database, $id)
    {
        
        $deletePosts = Post::find($id)->delete();
        if($deletePosts===1)
        {
            return "Post has been deleted";
        }
        else
        {
            return "Cannot delete post as it is assoiciated with a particular user.Please delete the associated user to delete this post";
        }
    }

    public function getPostById($database, $id)
    {
       
        return Post::find($id);
    }

    public function createPosts($database, Request $request)
    {

        $createPost = Post::create([

            'user_id' => $request->user_id,
            'name' => $request->name,
            'body' => $request->body,

        ]);
        if($createPost==true)
        {
            return "Post created!!";
        }
        else
        {
            return "Unable to create posts";
        }
    }

    public function updateUsers($database, $id, Request $request)
    {

        $updateUser = User::find($id)->update([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        if($updateUser==true)
        {
            return "User updated";
        }
        else
        {
            return "Unable to update";
        }
    }

    public function updatePosts($database, $id, Request $request)
    {
        
        $updatePosts = Post::find($id)->update([

            'name' => $request->name,
            'body'=> $request->body 

        ]);
        if($updatePosts==true)
        {
            return "Post Updated";
        }
        else
        {
            return "Unable to update";
        }
    }
}
