<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'sk_user_groups';
    protected $guarded = [];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
