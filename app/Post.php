<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = array('title','author','image','short_desc','description','category_id');
    public function category() {
        return $this->belongsTo('category');
    }
    public function comment() {
        return $this->hasMany('comment');
    }
}
