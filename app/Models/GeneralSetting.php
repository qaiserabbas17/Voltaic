<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'generalsetting';

    protected $fillable = [
       
       'id', 'title', 'logo', 'favicon', 'address', 'phone', 'email', 'facebook', 'twitter', 'instagram', 'linkedin'
    ];
}
