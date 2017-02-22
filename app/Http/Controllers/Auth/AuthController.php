<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->auth = $auth;
        // $this->registrar = $registrar;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
           // 'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',//make sure the email is an actual email
            'password' => 'required|alphaNum|min:6|confirmed',//password can only be alphanumeric and has to be greater than 6characters
        ]);
    }
    /**
     * @param Request $request
     * @var array
     * @return \Illuminate\Http\Response 
     */
    public function authenticate(Request $request){
        
        $res=[];
        $userdata=[
            'email'=>$request->get('email'),
            'password'=>$request->get('password')];

        //validate the info, create rules for the inputs
        $validator=validator($request->all());
        if($validator->fails()){
            $res=0;        
        }else{
            // $user=User::select('password')->where('email','=',$email)->pluck('password');
             // if(Hash::check($password,$user[0])){
             //    // if(password_verify($request->get('password'),$user->get('password'))){
             //    $res=1;

        
             // }else{
             //    $res=2;
             
            //doing login
             $res=Auth::attempt($userdata)?1:0;
    }
        return $res;
    }
    
     /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function logout(){
        Auth::logout();
        return redirect('login');
        // return response(array(
        //         'error' => 'error logout',
        //         'message' => 'success logout' ,
        //         ),200);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return Illuminate\Http\Response
     */
    protected function create(Request $request)
    {
        $user = new User();
        $user->fill([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);


        $user->save();
        return response($user,200);
    }
}
