<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::paginate(6);
        if (count($partners) > 0) {
            return PartnerResource::collection($partners);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no partners yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/partners/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        Partner::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'partner has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            return response()->json([
                'success' => true,
                'partner' => new PartnerResource($partner)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such partner'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/partners/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $partner->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'partner has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such partner'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            $partner->delete();
            return response()->json([
                'success' => true,
                'msg' => 'partner has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such partner'
            ], 404);
        }
    }
}
