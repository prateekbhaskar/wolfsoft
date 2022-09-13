<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class usercontroller extends Controller
{
    //loading sign in page
    public static function index()
    {
        if (auth()->user()) {
            return redirect('/profile',);
        }
        return view('login', ['title' => 'login']);
    }
    //loading sign up page
    public static function signup()
    {
        if (auth()->user()) {
            return redirect('/profile',);
        }
        return view('signup', ['title' => 'signup']);
    }
    //register new user
    public static function store(Request $request)
    {
        if (auth()->user()) {
            return redirect('/profile');
        }
        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed',
            'gender' => ['required'],
            'photo' =>'mimes:jgp,png,jpeg,PNG,JPEG,JPG'
        ]);
        //hashing password
        $formFields['password'] = bcrypt($formFields['password']);

        //storing image
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('profile-photo', 'public');
        }
        //creating user
        $user = User::create($formFields);

        //creating session
        auth()->login($user);
        return redirect('/profile')->with('message', 'Hello, Dear '.auth()->user()->first_name);
    }
    public static function login(Request $request)
    {
        if (auth()->user()) {
            return redirect('/profile');
        }
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/profile')->with('message', 'Welcome back '.auth()->user()->first_name);
        }
        return back()->withErrors(['email' => 'Wrong Credentials'])->onlyInput('email');
    }
    public static function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerate();
        return redirect('/')->with('message', 'Logout Successful');
    }
    public static function profile()
    {
        if (auth()->user()) {
            return view('profile', ['title' => 'profile']);
        }
        return redirect('/');
    }
    //register new user
    public static function update(Request $request)
    {
        if (!auth()->user()) {
            return redirect('/');
        }
        $formFields = $request->validate([
            'first_name' => ['required','min:3'],
            'last_name' => ['required','min:3'],
            'email' => ['required','email','unique:users,email,'.auth()->user()->id],
            'gender' => ['required'],
            'photo' =>'mimes:jgp,png,jpeg,PNG,JPEG,JPG'
        ]);
        //storing image
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('profile-photo', 'public');
        }
        //creating user
        DB::table('users')->where('id',auth()->user()->id)->update($formFields);


        return redirect()->back()->with('message', 'Detail updated');
    }
}
