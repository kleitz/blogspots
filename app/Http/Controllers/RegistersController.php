<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Image;
use Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SocialLogin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socialLogin($provider = null, $auth = null)
    {
        $profile = SocialLogin::getSocialProfile($provider, $auth);
        
        if(!$profile)
            Redirect::to('register')->withErrors(['message' => 'Failed to get user profile']);

        try {
            $user = User::where(['email' => $profile->email])->first();
            if(!$user){
                $this->registerNewSocialUser($profile);
            } else {
                Auth::login($user);
            }
            return Redirect::to(route('users.dashboard'));
        } catch(\ModelNotFoundException $e) {
            dd($e->message());
        }
    }

    public function registerNewSocialUser($profile) {
        $user = new User();
        $user->email = $profile->email ? $profile->email : $profile->phone;
        $user->displayName = $profile->displayName;
        $user->firstName = $profile->firstName;
        $user->lastName = $profile->lastName;
        $user->photo = $profile->photoURL;
        $user->source = 'facebook';
        $user->gender = $profile->gender;
        
        if($user->save()) {
            Auth::loginUsingId($user->id);
        }

        return Redirect::to('register')->withErrors(['message' => 'Failed to register new user']);
    }


    public function doLogin(Request $request)
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 0
        ];

        $err = [
            'messages' => 'Your account is inactive',
            'class' => 'danger'
        ];

        if(Auth::attempt($user)) {
            return Redirect::to(route('registers'))->with($err);
        }

        $user['status'] = 1;
        if(Auth::attempt($user)) {
            return Redirect::to(route('users.dashboard'));
        }

        $err['messages'] = 'Invalid Username/Password';
        return Redirect::to(route('registers'))->with($err);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return View::make('registers.registration')->with(['title' => ' Registration Page']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $request->merge(['displayName' => $request->firstName . ' ' . $request->lastName]);

        $fullname = null;
        if($request->file('photo') !== null) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $destinationPath = 'img/uploads/';
            $filename = $request->email;
            $fullname = rand(11111, 99999).'_'.$filename.'.'.$ext;

            $success = $request->file('photo')->move($destinationPath, $fullname);

            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            Image::make($success)->resize(110, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/thumbs/'.$fullname);
        }

        $user = new User();
        $user->fill($request->except('photo'));
        $user->photo = !$fullname ? '' : 'img/uploads/'.$fullname;
        if($user->save()) {
            Auth::login($user);
            return Redirect::to(route('users.dashboard'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('registers');
    }

    public function show()
    {
        return View::make('registers.login')->with(['title' => $this->title . 'Login Page']);
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
