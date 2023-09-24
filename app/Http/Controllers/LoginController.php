<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Hash;
use Session;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    function login(){
        return view ('login');
    }
    function registration(){
        return view ('registration');
    }
    function profile(){
        return view ('profile');
    } 
    function ProfileEdit(){
        return view ('profileedit');
    } 
    
    function index(){
        return view ('index');
    } 

    function validate_registration(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'IBAN' => 'required|unique:users',
            'NIF' => 'required|unique:users',
            'phoneNumber' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'locality' => 'required',
        ]);
    
        $data = $request->all();
    
        $user = User::where('username', $data['username'])->orWhere('NIF', $data['NIF'])->orWhere('email', $data['email'])->orWhere('IBAN', $data['IBAN'])->first();
    
        if($user){
            $errorMsg = [];
            if($user->username === $data['username']){
                $errorMsg[] = 'Username is already in use.';
            }
            if($user->NIF === $data['NIF']){
                $errorMsg[] = 'NIF is already in use.';
            }
            if($user->email === $data['email']){
                $errorMsg[] = 'Email is already in use.';
            }
            if ($user->IBAN === $data['IBAN']) {
                $errorMsg[] = 'IBAN is already in use.';
            }
            return redirect()->back()->withErrors($errorMsg);
        }
        $userid = 2;
        User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'IBAN' => $data['IBAN'],
            'NIF' => $data['NIF'],
            'phoneNumber' => $data['phoneNumber'],
            'address' => $data['address'],
            'postalCode' => $data['postalCode'],
            'locality' => $data['locality'],
            'src' => '/storage/images/1679682585Sample_User_Icon.png',
            'roleID' => $userid
        ]);
        
        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }
    
    function validate_update(Request $request ){
        
        $id = Auth::user()->id;

        $request->validate([
            'name'     => 'required',
            'surname'=> 'required',
            'email'=> 'required',
            'IBAN' => 'required',
            'NIF' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'locality' => 'required'

        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('src')) {
            $filename = time().$request->file('src')->getClientOriginalName();
            $path = $request->file('src')->storeAs('images', $filename, 'public');
            $data['src'] = '/storage/'.$path;
        }
        else{
            $data['src'] = Auth::user()->src;
        } 
        $userid = 2;
        
        User::where('id', '=', $id)->update([
            'name'     => $data['name'],
            'surname'=> $data['surname'],
            'email'=> $data['email'],
            'IBAN' => $data['IBAN'],
            'NIF' => $data['NIF'],
            'phoneNumber' => $data['phoneNumber'],
            'address' => $data['address'],
            'postalCode' => $data['postalCode'],
            'locality' => $data['locality'],
            'src' => $data['src'],
            'roleID' => $userid
        ]);

        return redirect('profile');

    } 

    function validate_login (Request $request ){
        $request->validate([
            'username' => 'required',//|username|unique:users',
            'password' => 'required|min:6',

        ]);
        
        $credentials = $request->only('username', 'password');
        
        if(Auth::attempt($credentials)){
            return redirect ('/');
        } 
        return redirect ('login')->with('success', 'Login details are not valid');
    } 

    function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        } 
        return redirect ('login')->with('success', 'You need to login first');
    } 
    function logout(){
        Session::flush();

        Auth::logout();

        return redirect('login');
    } 


    public function editProfileAdmin($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->get();
        
        if(!Auth::check() || Auth::user()->roleID != 1 || $user->isEmpty()){
            return view('errors.404');
        }
        
        return view('profileeditadmin', ['user' => $user]);
    }


    public function deleteProfileAdmin($id)
{
    $user = User::find($id);

    if(!$user || Auth::user()->roleID != 1){
        return view('errors.404');
    }

    $productCount = Product::where('userID', $id)->count();

    if($productCount > 0){
        return view('confirmdeleteuser', compact('user'));
    }

    $user->delete();
    Product::where('userID', $id)->delete();
    return redirect()->route('users');
}

public function confirmDelete($id)
{
    $user = User::find($id);

    if(!$user || Auth::user()->roleID != 1){
        return view('errors.404');
    }
    Product::where('userID', $id)->delete();
    $user->delete();
    return redirect()->route('users');
}



    function validate_update_admin(Request $request ){
        
        $id = Auth::user()->roleID;

        if($id != 1){
            return view('errors.404');
        }
        else{
            $request->validate([
                'username' => 'required',
                'name'     => 'required',
                'surname'=> 'required',
                'email'=> 'required',
                'IBAN'=> 'required',
                'NIF' => 'required',
                'phoneNumber' => 'required',
                'address' => 'required',
                'postalCode' => 'required',
                'locality' => 'required',
                'roleID' => 'required'
            ]);
            
            $data = $request->all();
            
            if ($request->hasFile('src')) {
                $filename = time().$request->file('src')->getClientOriginalName();
                $path = $request->file('src')->storeAs('images', $filename, 'public');
                $data['src'] = '/storage/'.$path;
                
                $userid = $data['id'];
            
            User::where('id', '=', $userid)->update([
                'username' => $data['username'], 
                'name'     => $data['name'],
                'surname'=> $data['surname'],
                'email'=> $data['email'],
                'IBAN' => $data['IBAN'],
                'NIF' => $data['NIF'],
                'phoneNumber' => $data['phoneNumber'],
                'address' => $data['address'],
                'postalCode' => $data['postalCode'],
                'locality' => $data['locality'],
                'src' => $data['src'],
                'roleID' => $data['roleID'] 
            ]);

            }
            else{
                $userid = $data['id'];
            
                User::where('id', '=', $userid)->update([
                    'username' => $data['username'], 
                    'name'     => $data['name'],
                    'surname'=> $data['surname'],
                    'email'=> $data['email'],
                    'IBAN' => $data['IBAN'],
                    'NIF' => $data['NIF'],
                    'phoneNumber' => $data['phoneNumber'],
                    'address' => $data['address'],
                    'postalCode' => $data['postalCode'],
                    'locality' => $data['locality'],
                    'roleID' => $data['roleID'] 
                ]);
            } 
            
            
        } 
        return redirect()->route('users');
    } 
   
}
