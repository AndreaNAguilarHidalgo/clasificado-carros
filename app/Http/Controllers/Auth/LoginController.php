<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SocialProfile;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {

        $userSocialite = Socialite::driver($driver)->user();
        //dd($userSocialite);
        // Verifica si existe registro
        $user = User::where('email', $userSocialite->getEmail())->first();

        if(!$user){
            // Si no existe lo crea 
            $user = User::create([
                'name'=> $userSocialite->getName(),
                'email'=> $userSocialite->getEmail(),


            ]);
        }
        
        // Verificar si en la tabla social_profile
        $social_profile = SocialProfile::where('social_id', $userSocialite->getId())
                                        ->where('social_name', $driver)->first();

        if(!$social_profile){
            // Si no existe lo crea en la DB
            SocialProfile::create([
                'user_id' => $user->id,
                'social_id'=> $userSocialite->getId(),
                'social_name'=> $driver,
                'social_avatar' => $userSocialite->getAvatar()
            ]);
        }

        // login 
        auth()->login($user);

        // Redirección
        return redirect()->action('InicioController@index');
        // $user->token;
    }
}
