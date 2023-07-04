<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{
    use HasFactory;

    protected $table = 'tags';

    public function user(){
        return $this->belongsTo('App\Models\Post');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }
}