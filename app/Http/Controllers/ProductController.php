<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        Product::create($fields);
        return redirect('/dashboard');
    }

    public function showEditPage(Product $product){
        if(auth()->user()->rol=== "ventas"){
            auth()->logout();

            return redirect('/login', ["error" => "No estas autorizado a realizar esta acción"]);
        }
        return view('edit-product', ['product' => $product]);
    }

    public function editProd(Product $product, Request $request){
        if(auth()->user()->rol=== "ventas"){
            auth()->logout();

            return redirect('/login', ["error" => "No estas autorizado a realizar esta acción"]);
        }
        $fields=$request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $fields['name']=strip_tags($fields['name']);
        $fields['price']=strip_tags($fields['price']);
        $product->update($fields);
        return redirect('/dashboard');
    }
    public function deleteProduct(Product $product){
        if(auth()->user()->rol !== "ventas"){
            $product->delete();
        }
        auth()->logout();
        return redirect('/login', ["error" => "No estas autorizado a realizar esta acción"]);
    }
}
