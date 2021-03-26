<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    public function add(){
        $manufacturers = DB::table('manufacturers')->get();
        return view('add', ['manufacturers'=>$manufacturers]);
    }

    public function create(Request $request){
        $this->validate($request,['name'=>'required']);
        $this->validate($request,['detail'=>'required']);
        $name = $request['name'];
        $detail = $request['detail'];
        $manufacturer_id = $request['manufacturer'];

        $product = new Product();
        $product->name = $name;
        $product->detail = $detail;
        $product->manufacturer_id = $manufacturer_id;

        $product->save();
        return redirect('/');
    }

    public function show(){
        $products = Product::all();
        $manufacturers = DB::table('manufacturers')->get();

        return view('show', ['products'=>$products, 'manufacturers'=>$manufacturers]);
    }

    public function edit(Product $product){
        $manufacturers = DB::table('manufacturers')->get();
        return view('edit', compact('product'), ['manufacturers'=>$manufacturers, 'product'=>$product]);
    }

    public function update(Request $request, Product $product){
        $this->validate($request,['name'=>'required']);
        $this->validate($request,['detail'=>'required']);
        $product->name = $request->name;
        $product->detail = $request->detail;
        $manufacturer_id = $request['manufacturer'];
        $product->manufacturer_id = $manufacturer_id;
        $product->update();
        return redirect('/');
    }

    public function delete(Product $product){
        $product->delete();
        return redirect('/');
    }

}
