<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    //
    protected $tabel='stadia';
    protected $fillable=['name'];
    public function Club(){
    	return $this->hasMany(Club::class);
    }
}
