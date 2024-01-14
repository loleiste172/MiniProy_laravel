<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function createProd(Request $request) {
        $fields=$request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $fields['name']=strip_tags($fields['name']);
        $fields['price']=strip_tags($fields['price']);
        $fields['user_id']=auth()->id();
        //dd($fields);
        Product::create($fields);
        return redirect('/dashboard');
    }

    public function showEditPage(Product $product){
        //dd($product);
        // if(auth()->user()->rol=== "ventas"){
        //     auth()->logout();

        //     return redirect('/login', ["error" => "No estas autorizado a realizar esta acción"]);
        // }
        return view('edit', ['product' => $product]);
    }

    public function editProd(Product $product, Request $request){
        
        // if(auth()->user()->rol=== "ventas"){
        //     auth()->logout();

        //     return redirect('/login', ["error" => "No estas autorizado a realizar esta acción"]);
        // }
        $fields=$request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $fields['name']=strip_tags($fields['name']);
        $fields['price']=strip_tags($fields['price']);
        $fields['user_id']=auth()->id();
        $product->update($fields);
        return redirect('/dashboard');
    }
    public function deleteProduct(Product $product){
        $product->delete();
            
        return redirect('/dashboard');
        
    }
    public function showDashboard(){
        if(auth()->check()){
            //$prods=DB::table('products')->select('id', 'name', 'price')->get();
            $prods=Product::paginate(5);
            return view('/dashboard')->with('products', $prods);
        }
        //HACER ALGO EN CASO DE NO ESTAR LOGIN
    }
    public function vShow() {
        if(auth()->check()){
            return view('add');
        }
        //HACER ALGO EN CASO DE NO ESTAR LOGIN
    }
    public function showProd(Product $product){
        //dd($product);
        //$producto=Product::where('id', $product);
        
        return view('/show', ['product' => $product]);
    }
}
