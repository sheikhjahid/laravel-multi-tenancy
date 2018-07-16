<?php
namespace App\Customer\Models;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{

	protected $fillable = ['user_id','name','body'];

	use SoftDeletes;

	const CREATED_AT = "createdAt";
	const UPDATED_AT = "updatedAt";
	const DELETED_AT = "deletedAt";

    use UsesTenantConnection;
    public function user()
    {
        return $this->belongsTo(App\Customer\Models\User::class);
    }
}