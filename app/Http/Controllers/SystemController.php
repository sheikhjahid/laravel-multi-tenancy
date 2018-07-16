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
       
    	 Config::set('database.connections.tenant.database',$database);
       
         return User::with('posts')->get();
       
    } 

    public function deleteTenantData($database, $id)
    {
        
        
         Config::set('database.connections.tenant.database',$database);
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
      
           Config::set('database.connections.tenant.database',$database);
           
           $getUserData = User::find($id);
           return $getUserData;

    }

    public function getUserByPost($database, $id)
    {
        Config::set('database.connections.tenant.database',$database);

        $getPostData = Post::find($id);
        
        $getUserId = $getPostData->user_id;
        
        $getUserData = User::find($getUserId);

        return $getUserData;
       
    }

    public function createCustomers($database, Request $request)
    {
        $data = [$request->name, $request->email, $request->password];

        Config::set('database.connections.tenant.database',$database);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) 

        ]);

        return "User Created!!";
    }

    public function getPostData($database)
    {
        Config::set('database.connections.tenant.database',$database);
        return Post::all();
    }

    public function deletePosts($database, $id)
    {
        Config::set('database.connections.tenant.database',$database);

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
}
