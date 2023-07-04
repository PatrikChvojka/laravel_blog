<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model 
{
    use HasFactory;

    protected $table = 'posts';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'text',
    ];

    public function getCreatedAtAttribute($value){
        return date('j M Y, G:i', strtotime($value));
    }

    public function getTeaserAttribute(){
        return str_limit($this->text, 150);
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    
}