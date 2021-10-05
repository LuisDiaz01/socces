<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table='types';
    protected $fillable = ['name'];
    public function Posts(){
    	return $this->hasMany(Post::class);
    }
}
