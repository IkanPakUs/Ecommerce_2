<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|unique:App\User,name',
            'email' => 'required|email|unique:App\User,email',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ]);
        
        $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->password = $request->password;
        $user->save();

        $user_role= new UserRole();
            $user_role->user_id = $user->id;
            $user_role->role_id = 2;
        $user_role->save();
        
        auth()->login($user);
        
        return redirect()->route('index')->withErrors($validator);
    }

    public function userLogin(Request $request) {

        $auth_validation = $request->only('email', 'password');

        if (auth()->attempt($auth_validation)) {
            return redirect()->route('index');
        }

        $message = ['message' => 'The email or password is incorrect, please try again'];
        return back()->withErrors($message);
        
    }

    public function userLogout(Request $request) {
        Auth::logout();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
