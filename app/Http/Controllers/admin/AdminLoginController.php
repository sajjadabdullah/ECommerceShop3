<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if ($validator->passes())
        {
            if (Auth::guard('admin')->attempt(
                ['email'=>$request->email, 'password'=>$request->password],
                $request->get('remember')))
                {

                }
        }
        else
        {
            return redirect()->route('admin.login')
                             ->withErrors($validator)
                             ->withInput($request->only('email'));
        }
        
        // dd($request->input());
        // $user_data=array(
        // }        
    }
}
