<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table='divisions';
    protected $fillable=['division'];
    public function Template(){
    	return $this->hasMany(Template::class);
    }
}
