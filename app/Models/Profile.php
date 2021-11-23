<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'json',
        'integer',
        'boolean',
        'user_id',
        'photo_id'
    ];
    public function user()
    {
        return $this->hasOne(Profile::class,"id","user_id");
    }
    public function results()
    {
        return $this->hasMany(Results::class,"profile_id","id");
    }
    public function photos()
    {
        return $this->hasMany(Results::class,"photo_id","id");
    }
}
