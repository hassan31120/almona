<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppResource;
use App\Models\App;
use App\Models\AppCat;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $apps = App::paginate(6);
        if (count($apps) > 0) {
            return AppResource::collection($apps);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no apps yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'b_head' => 'required',
            'b_body' => 'required',
            'b_image' => 'required',
            'pages' => 'required|numeric',
            'downlaods' => 'required|numeric',
            'customers' => 'required|numeric',
            'country' => 'required|numeric',
            'c_name' => 'required',
            'c_body' => 'required',
            'c_logo' => 'required',
            'cat_id' => 'required',
        ]);
        $data = $request->except('images');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('b_image')) {
            $file = $request->file('b_image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['b_image'] = $name;
        }
        if ($request->hasFile('c_logo')) {
            $file = $request->file('c_logo');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['c_logo'] = $name;
        }
        $app = App::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'app has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $app = App::find($id);
        if ($app) {
            return response()->json([
                'success' => true,
                'app' => new AppResource($app)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such app'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $app = App::find($id);
        if ($app) {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                // 'image' => 'required',
                'price' => 'required|numeric',
                'b_head' => 'required',
                'b_body' => 'required',
                // 'b_image' => 'required',
                'pages' => 'required|numeric',
                'downlaods' => 'required|numeric',
                'customers' => 'required|numeric',
                'country' => 'required|numeric',
                'c_name' => 'required',
                'c_body' => 'required',
                // 'c_logo' => 'required',
                'cat_id' => 'required',
            ]);
            $data = $request->except('images');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            if ($request->hasFile('b_image')) {
                $file = $request->file('b_image');
                $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['b_image'] = $name;
            }
            if ($request->hasFile('c_logo')) {
                $file = $request->file('c_logo');
                $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['c_logo'] = $name;
            }
            $app->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'app has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such app'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $app = App::find($id);
        if ($app) {
            $app->delete();
            return response()->json([
                'success' => true,
                'msg' => 'app has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such app'
            ], 404);
        }
    }
}
