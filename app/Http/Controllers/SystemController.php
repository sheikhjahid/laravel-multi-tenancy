<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer\Models\User;
use App\System\Models\User as SystemUser;
use App\System\Models\Website as SystemWebsite;
use DB;
use Config;

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
        return User::all();
    } 

    public function deleteTenantData($database, $id)
    {
         Config::set('database.connections.tenant.database',$database);
        $deleteData = User::find($id)->delete();
        if($deleteData == 1)
        {
            return "deleted Tenant";
        }
        else
        {
            return "Unable to delete tenant";
        }
    }

    public function getSpecificTenantData($database, $id)
    {
        Config::set('database.conections.tenant.database',$database);

       return User::find($id);
    }
}
