<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    public $table = 'role_permission';
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $fillable = [
        'role_id',
        'module_id',
        'pview',
        'pcreate',
        'pedit',
        'pdelete'
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
