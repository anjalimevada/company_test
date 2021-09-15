<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Mail\VerifyCompanyMail;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Company;
use Validator;
use Session;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function getLogin()
    {
        return view('admin.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
         ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors());       
        }
       
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
                \Session::put('success','You are Login successfully!!');
                return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
        } else {
            return back()->with('error','Whoops! invalid username and password.');
        }
    }

    /**
     * View all users
     * 
     * @author Sidhwani Technologies
     */
    public function dashboard()
    {
        $companies = Company::paginate(10);
        return view('admin.dashboard', compact('companies'));
    }

    /**
     * List of all users
     * 
     * @author Sidhwani Technologies
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajax_listing(Request $request) 
    {     
        $user_list=array();
        $total_rows=0;
        $user_list = Company::orderBy($request->sort, $request->order);
        $total_rows=$user_list->get()->count();
        $user_list=$user_list->skip($request->offset)->take($request->limit)->get();
        
        $data = array(); 
        if (!empty($user_list)) {
            foreach ($user_list as $key => $user) {
                $row = array();
                $row['id'] = $key + 1;
                $row['name'] = $user->name;
                $row['email'] = $user->email;
                $row['mobile'] = $user->mobile; 
                $row['address'] = $user->address; 
                $row['logo'] ='<img src="'. $user->logo.'"/ height="50" width="50">';
                $row['website'] = $user->website; 
                $status = ""; 
                if ($user->is_deleted == "0") {
                    $status = '<a href="javascript:void(0);" class="btn btn-success btn-circle btn-xs"> <b>Company Active</b> </a>';
                } else {
                    $status = '<a href="javascript:void(0);" class="btn btn-danger btn-circle btn-xs"> <b>Company Deleted</b> </a>';
                }
                $row['is_deleted'] = $status; 
                $data[] = $row;
            }
        }
        $response = array(  
            "rows" => $data,    
            "total" =>$total_rows
        );
        echo json_encode($response);
    }

    public function getCompanyRegister()
    {
        return view('admin.company_register');
    }

    public function postCompanyRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10',
            'address' => 'required',
            'website'=> 'required',        
            'password' => 'required|confirmed|min:6'
        ]);
        if($validator->fails()){
            return back()->withInput($request->all())->withErrors($validator->errors());
        }
        $userArray = array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'website' => $request->website,
        );
        $user = Company::create($userArray);

        $mailArray = array(
            'name' => $user->name
        );
        // Mail::to([$user->email])->send(new VerifyCompanyMail($mailArray));

        if((isset($request->logo)) && (!empty($request->logo))) 
        {
            $user->addMediaFromRequest('logo')->preservingOriginal()->toMediaCollection('company-logo');
        }
        \Session::put('success','Company register successfully!!');
        return redirect()->route('adminDashboard');
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        \Session::put('success','You are logout successfully');        
        return redirect(route('adminLogin'));
    }
}
