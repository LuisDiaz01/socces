<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='rols';
    protected $fillable = ['id','rol'];
    public function User(){
    	return $this->hasMany(User::class,'rol_id');
    }
}
