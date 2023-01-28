<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;

class CatController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        if (count($cats) > 0) {
            return response()->json([
                'success' => true,
                'cats' => CategoryResource::collection($cats)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no cats yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        Category::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'cat has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $cat = Category::find($id);
        if ($cat) {
            return response()->json([
                'success' => true,
                'cat' => new CategoryResource($cat)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such cat'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        if ($cat) {
            $request->validate([
                'name' => 'required'
            ]);
            $data = $request->all();
            $cat->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'article has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such cat'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        if ($cat) {
            $cat->delete();
            return response()->json([
                'success' => true,
                'msg' => 'article has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such cat'
            ], 404);
        }
    }
}
