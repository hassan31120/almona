<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\MotionResource;
use App\Models\Motion;
use Illuminate\Http\Request;

class MotionController extends Controller
{
    public function index()
    {
        $videos = Motion::paginate(10);
        if (count($videos) > 0) {
            return MotionResource::collection($videos);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no videos yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/videos/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $video = Motion::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'video has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $video = Motion::find($id);
        if ($video) {
            return response()->json([
                'success' => true,
                'video' => new MotionResource($video)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such video'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $video = Motion::find($id);
        if ($video) {
            $request->validate([
                'link' => 'required',
                'cat_id' => 'required'
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/motions/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $video->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'video has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such video'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $video = Motion::find($id);
        if ($video) {
            $video->delete();
            return response()->json([
                'success' => true,
                'msg' => 'video has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such video'
            ], 404);
        }
    }
}
