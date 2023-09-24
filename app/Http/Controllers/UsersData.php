<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersData extends Controller
{
    //
    function list()
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        $id = Auth::user()->id;
        $limit = 9; 
        $offset = (1 - 1) * $limit; 
        $data = DB::table('users')->where('id', '!=', $id)->where('roleID', '=', '2')->offset($offset)->limit($limit)->get();
        $totalResults = DB::table('users')->where('id', '!=', $id)->count();
        
        if(Auth::user()->roleID == 1){
            return view('userlist',['data'=>$data] );
        } 
        else{
            return view('errors.404');
        } 
    }

}
