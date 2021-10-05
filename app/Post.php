<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable = ['title','content','type_id','img'];
    
    public function Type(){
    	return $this->belongsTo(Type::class,'type_id');
    }
}
