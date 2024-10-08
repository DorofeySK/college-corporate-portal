<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;

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
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, []);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login(Auth::user());
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm()
    {
        $context = [
            'departs' => Department::get(),
            'jobs' => Job::get(),
            'users' => User::get()
        ];
        return view('users.register', array_merge($this->authInfo(), $context));
    }

    protected function create(array $data)
    {
        $params = [
            'login' => $data['login'],
            'first_name' => $data['first_name'],
            'second_name' => $data['second_name'],
            'job_id' => json_encode(['jobs' => array_map('intval', $data['job_id'])]),
            'department_id' => intval($data['department_id']),
            'password' => Hash::make($data['password']),
            'patronymic' => $data['patronymic']
        ];
        if ($data['header'] != 'null') {
            $params['header'] = $data['header'];
        }
        return User::create($params);
    }
}
