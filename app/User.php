<?php

namespace Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $table='users';
    protected $fillable = [ 'name','lastname','rol_id', 'email', 'password','last_login','confirmed','confirmation_code','dni','date_n','network_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    private function checkIfUserHasRole($need_role){
        return (strtolower($need_role) == strtolower(Auth::User()->rol_id)) ? true : null;
    }
    
    public function hasRole($rol){
        if (is_array($rol)) {
            foreach ($rol as $need_role){
                if ($this->checkIfUserHasRole($need_role)){
                    return true;
                }
            }
        }else {
            return $this->checkIfUserHasRole($rol);
        }
        return false;
    }
    public function Rol(){
        return $this->belongsTo(Rol::class,'rol_id');
    }

    public function Network(){
        return $this->belongsTo(Network::class,'network_id');
    }
    
    public function Templates(){
        return $this->hasMany(Template::class,);
    }
   
}
