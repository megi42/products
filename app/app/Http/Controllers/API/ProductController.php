<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Product as ProductResource;

class ProductController extends BaseController
{
    public function index()
    {
        $products = ProductModel::all();

        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'detail'=>'required',
            'manufacturer_id'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }

        $product = ProductModel::create($input);
        return $this->sendResponse(new ProductResource($product), ' Product created successfully');

    }

    public function show($id)
    {
        $product = ProductModel::find($id);
        if(is_null($product)){
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse(new ProductResource($product), ' Product retrievd successfully');

    }

    public function update(Request $request, ProductModel $product)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'detail'=>'required',
            'manufacturer_id'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }


        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->manufacturer_id = $input['manufacturer_id'];
        $product->save();

        return $this->sendResponse(new ProductResource($product), ' Product updated successfully');

    }

    public function destroy(ProductModel $product)
    {
        $product->delete();
        return $this->sendResponse([], ' Product deleted successfully');

    }
}
