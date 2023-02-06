<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        if (count($products) > 0) {
            return ProductResource::collection($products);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no products yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'ads' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/products/images/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        Product::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'product has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'success' => true,
                'product' => new ProductResource($product)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such product'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $request->validate([
                'title' => 'required',
                'desc' => 'required',
                'ads' => 'required',
                'price' => 'required|numeric',
                'cat_id' => 'required'
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/products/imgages/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $product->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'product has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such product'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'success' => true,
                'msg' => 'product has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such product'
            ], 404);
        }
    }
}
