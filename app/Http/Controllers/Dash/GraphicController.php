<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\GraphicResource;
use App\Models\Graphic;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    public function index()
    {
        $graphics = Graphic::paginate(6);
        if (count($graphics) > 0) {
            return GraphicResource::collection($graphics);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no graphics yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/graphics/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $graphic = Graphic::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'graphic has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $graphic = Graphic::find($id);
        if ($graphic) {
            return response()->json([
                'success' => true,
                'graphic' => new GraphicResource($graphic)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such graphic'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $graphic = Graphic::find($id);
        if ($graphic) {
            $request->validate([
                'cat_id' => 'required'
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/graphics/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $graphic->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'graphic has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such graphic'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $graphic = Graphic::find($id);
        if ($graphic) {
            $graphic->delete();
            return response()->json([
                'success' => true,
                'msg' => 'graphic has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such graphic'
            ], 404);
        }
    }
}
