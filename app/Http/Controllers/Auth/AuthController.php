<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mailers\AppMailer;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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

    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'username' => 'required|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'cpf' => 'required|cpf|max:14|unique:users',
            'password' => 'required|min:6|confirmed',
            'referred_by' => 'required|exists:users,username',
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($referrer=null)
    {
        $referrer_user = null;

        if ($referrer !== null)
        {
            $referrer_user = \App\User::where('username', $referrer)->first();
        }

        return view('auth.register')
            ->with('referrer', $referrer_user);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, AppMailer $mailer)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        $mailer->sendConfirmation($user);

        return redirect()->route('thankyou', ['username' => $user->username]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'password' => bcrypt($data['password']),
            'active' => false,
            'confirmation_code' => str_random(30),
            'referred_by' => $data['referred_by']
        ]);
    }

    public function confirm(AppMailer $mailer, $code)
    {
        $user = \App\User::where('confirmation_code', $code)->first();

        if (!$user) return;

        $user->confirmed = true;
        $user->active = true;
        $user->save();

        Auth::guard($this->getGuard())->login($user);

        return redirect('/');
    }
}
