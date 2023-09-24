<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ProductsData extends Controller
{
    //
    function list($page)
    {
        if(Auth::user()){
            $id = Auth::user()->id;
        } 
        else{
            $id = 0;
        } 
        $limit = 9; 
        $offset = ($page - 1) * $limit;
        if($id != 0){
            $data = DB::table('products')->offset($offset)->where('userID', '!=' , $id)->limit($limit)->get();
            $totalResults = DB::table('products')->where('userID', '!=' , $id)->count();
        } 
        else{
            $data = DB::table('products')->offset($offset)->limit($limit)->get();
            $totalResults = DB::table('products')->count();
        } 
        
        $categories = Categories::all();
        return view('productslist',['data'=>$data, 'categories' => $categories,'currentPage'=>$page, 'maxPages'=>ceil($totalResults/$limit)]);
      
    }



    function listMy($page)
    {
        $id = Auth::user()->id;
        $limit = 9; 
        $offset = ($page - 1) * $limit; 
        $data = DB::table('products')->where('userID', '=', $id)->offset($offset)->limit($limit)->get();
        $totalResults = DB::table('products')->where('userID', '=', $id)->count();
        return view('myproducts',['data'=>$data, 'currentPage'=>$page, 'maxPages'=>ceil($totalResults/$limit)]);
      
    }

    function listindex()
    {
        $data = DB::table('products')->paginate(9);
        return view('index',['data'=>$data] );
    }

    function editProduct($productID){
        $id = Auth::user()->id;
        $data = DB::table('products')->where('id', '=', $productID)->where('userID', '=', $id)->get();

        if($data->isEmpty()){
            return view('errors.404');
        }
        else{
            return view('myproductedit', ['data'=>$data] );
        } 
    }

    function editProductAdmin($productID){
        
        $data = DB::table('products')->where('id', '=', $productID)->get();

        if($data->isEmpty() || Auth::user()->roleID != 1){
            return view('errors.404');
        }
        else{
            return view('myproductedit', ['data'=>$data] );
        } 
    }

    function addproduct(){
        return view ('addproduct');
    } 

    function validate_add_product(Request $request ){
    
        $request->validate([
            'src' =>'required',
            'iva' => 'required',
            'price' => 'required',
            'name'     => 'required',
            'description'=> 'required',
            'categoryID' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('src')) {
            $filename = time().$request->file('src')->getClientOriginalName();
            $path = $request->file('src')->storeAs('images', $filename, 'public');
            $data['src'] = '/storage/'.$path;
        }

        $userid = Auth::user()->id;

        Product::create([
            'iva' => $data['iva'],
            'name'     => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'src' => $data['src'],
            'categoryID' => $data['categoryID'],
            'userID' => $userid
        ]);

        $page = 1;
        return app()->call('App\Http\Controllers\ProductsData@listMy', ['page' => $page]);

    } 

    function validate_update_product(Request $request ){
    
        $request->validate([
            'iva' => 'required',
            'price' => 'required',
            'name' => 'required',
            'description' => 'required',
            'categoryID' => 'required'
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('src')) {
            $filename = time() . $request->file('src')->getClientOriginalName();
            $path = $request->file('src')->storeAs('images', $filename, 'public');
            $data['src'] = '/storage/' . $path;
            $id = $data['id'];
            Product::where('id', '=', $id)->update([
                'iva' => $data['iva'],
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
                'src' => $data['src'],
                'categoryID' => $data['categoryID']
            ]);
        } else {
            $id = $data['id'];
            Product::where('id', '=', $id)->update([
                'iva' => $data['iva'],
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
                'categoryID' => $data['categoryID']
            ]);
        }
        
            $page = 1;
            $userid = $data['userID'];
            if(Auth::user()->roleID == 1 and Auth::user()->id != $userid){
                return app()->call('App\Http\Controllers\ProductsData@list', ['page' => $page]);
            } 
            return app()->call('App\Http\Controllers\ProductsData@listMy', ['page' => $page]);
    } 


    public function deleteProductConfirm($productID)
    {
        $id = Auth::user()->id;
        $data = DB::table('products')->where('id', '=', $productID)->where('userID', '=', $id)->get();

        if($data->isEmpty()){
            return view('errors.404');
        }
        else {
            DB::table('products')->where('id', '=', $productID)->delete();
            $page = 1;
            return app()->call('App\Http\Controllers\ProductsData@listMy', ['page' => $page]);
        }

    }

    public function deleteProductConfirmAdmin($productID)
    {
        $id = Auth::user()->roleID;
        $data = DB::table('products')->where('id', '=', $productID)->get();
        
        if($id != 1 or $data->isEmpty()){
            return view('errors.404');
        } 
        else {
            DB::table('products')->where('id', '=', $productID)->delete();
            $page = 1;
            return app()->call('App\Http\Controllers\ProductsData@list', ['page' => $page]);
        }
    }

}
