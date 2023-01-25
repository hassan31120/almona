<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\InfoResource;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::find(1);
        if ($info) {
            return response()->json([
                'success' => true,
                'info' => new InfoResource($info)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no info'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $info = Info::find(1);
        $request->validate([
            'views' => 'required|numeric',
            'customers' => 'required|numeric',
            'employees' => 'required|numeric',
            'projects' => 'required|numeric',
            'number' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $info->update($request->all());
        return response()->json([
            'success' => true,
            'msg' => 'info has been updated successfully!'
        ], 200);
    }
}
