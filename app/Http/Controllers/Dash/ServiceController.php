<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(6);
        if (count($services) > 0) {
            return ServiceResource::collection($services);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no services yet'
            ], 404);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'desc' => 'required',
            // 'price' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/services/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        Service::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'service has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $service = Service::find($id);
        if ($service) {
            return response()->json([
                'success' => true,
                'service' => new ServiceResource($service)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such service'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        if ($service) {

            $request->validate([
                'name' => 'required',
                'desc' => 'required',
                // 'price' => 'required',
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/services/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $service->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'service has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such service'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return response()->json([
                'success' => true,
                'msg' => 'service has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such service'
            ], 404);
        }
    }
}
