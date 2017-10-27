<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use Socialite;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createGoogleUser(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email']
        ]);

        $userId = $user->id;

        $userProfile = UserProfile::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'profile_type' => $data['profile_type'],
            'user_id' => $userId,
        ]);

        return $user;
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->scopes('email')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $socialUser = Socialite::driver('google')->user();
        // $token = $user->token;

        $emails = $socialUser->user['emails'];
        $emailKey = array_search('accounts', array_column($emails, 'type'));
        $data['name'] = $socialUser->user['displayName'];
        $data['email'] = $emails[$emailKey]['value'];
        $data['profile_type'] = 'google';

        $hasProfile = UserProfile::where('email', $data['email'])->where('profile_type', 'google')->first();
        if($hasProfile)
        {
          $user = $hasProfile->user()->first();
          $this->guard()->login($user);
          return redirect('/home');
        }

        event(new Registered($user = $this->createGoogleUser($data)));
        $this->guard()->login($user);
        return redirect('/home');
    }
}
