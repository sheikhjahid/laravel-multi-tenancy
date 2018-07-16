<?php
namespace App\System\Models;
use App\Shared\Models\User as Shared;
use Hyn\Tenancy\Traits\UsesSystemConnection;
class Website extends Shared
{
    use UsesSystemConnection;

   public static function getWebsiteData()
   {
   		return Website::all();
   }
}
