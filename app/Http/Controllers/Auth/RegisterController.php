<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
            'image' => ['required', 'mimes:jpeg,png,jpg', 'image', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'user' => ['required', 'string', 'in:customer,futsal'],
            'phone' => ['required', 'string', 'regex:/^[0-9\s()+-]+$/'],
            'location' => ['required', 'string'],
            'dob' => ['required', 'date']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['user'] == 'customer') {

            $role = 'Customer';
        }


        if ($data['user'] == 'futsal') {

            $role = 'Futsal';
        }

        $user = new User();
        $user->name  = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role   = $role;
        $user->phone    = $data['phone'];
        $user->location    = $data['location'];
        $user->dob    = $data['dob'];
        $user->save();
        $media = $user->addMediaFromRequest('image')
            ->toMediaCollection();

        $media->save();

        // return $user;
        return redirect()->route('admin.login')->with('Message', 'Register Successfully...');
    }

    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }


        if ($request->user  == 'customer') {

            return redirect()->route('customer.dashboard');
        }

        if ($request->user  == 'futsal') {

            return redirect()->route('futsal.dashboard');
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
}
