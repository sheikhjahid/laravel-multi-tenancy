<?php
namespace App\Customer\Models;
use App\Shared\Models\User as Shared;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Shared
{
	use SoftDeletes;

    use UsesTenantConnection;
    //protected $with = ['posts'];
   
    const CREATED_AT = "createdAt";
    const UPDATED_AT = "updatedAt";
    const DELETED_AT = "deletedAt";

    public function posts()
    {
        return $this->hasMany(\App\Customer\Models\Post::class);
    }
}