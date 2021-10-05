<?php

namespace Club\Http\Controllers\Auth;

use Club\User;
use Club\Area;
use Club\Career;
use Club\Mail\VerificationEmail;
use Carbon\Carbon;
use Mail;
use Club\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str as Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // public function showRegistrationForm(){
    //     $area=Area::all();
    //     $career=Career::all();
    //     return view('auth.register',compact('area','career'));
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|string|min:6|confirmed',
            'rol' => 'required|in:teacher,students',
            'dni'      => 'required|integer|min:1|unique:users,dni',
            
        ]);
    }
    public function showRegistrationForm(){
        $area=area::all();
        return view('auth.register',compact('area'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Club\User
     */
    protected function create(array $data){
        $data['confirmation_code']= ''.$slug.'-token='.rand().'-'.str_random(30).rand().'_'.str_random(30).'-Club';
        
       /* $e=$data['email'];
        $dominio=explode('@', $e, 2);
        //dd($dominio);
        if($dominio[1]=='unerg.edu.ve' && $data['rol']=="teacher"){
            $data['rol']=2;
            //dd($data);
        }else{
            $data['rol']=3;
        }*/
        
        $mail=Mail::send('emails.confimation_code', $data, function($message) use ($data) {
            $message->from($data['email'],'Club');
            $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo, para poder iniciar seccion en el sistema Club');
        });

        $user= User::create([
            'name'      => $data['name'],
            'dni'       => $data['dni'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'rol_id'    => 1,
            'confirmation_code' => $data['confirmation_code']
        ]);

        return $user;
    }
}
