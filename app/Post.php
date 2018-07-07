<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name (기본값으로 복수형이 들어가지만 바꿔줄 수도 있다.)
    protected $table = 'posts';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true; // 기본 값이 true로 되어있다. 원하지 않는다면 false로 설정하자.

    // Create Relationships --------------->

    // Single Post belongs To User.
    public function user(){
        return $this->belongsTo('App\User');
    }
}

