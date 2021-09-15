<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Company;
use Validator;
use Session;

class CompanyController extends Controller
{
    use AuthenticatesUsers;

    public function companyLogin()
    {
        return view('company.login');
    }

    public function postCompanyLogin(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
         ]);
        if($validator->fails()){
            return back()->withInput($request->all())->withErrors($validator->errors());
        }
       
        if (auth()->guard('company')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('company')->user();
                \Session::put('success','You are Login successfully!!');
                return redirect()->route('home')->with('success','You are Logged in sucessfully.');
        } else {
            return back()->with('error','Whoops! invalid username and password.');
        }   
    }
}
