<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::paginate(6);
        if (count($team) > 0) {
            return TeamResource::collection($team);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no team yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'job' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/team/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' .  $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        Team::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'member has been addedd to team successfully'
        ], 200);
    }

    public function show($id)
    {
        $team = Team::find($id);
        if ($team) {
            return response()->json([
                'success' => true,
                'team' => new TeamResource($team)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such member'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        if ($team) {
            $request->validate([
                'name' => 'required',
                'job' => 'required'
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/team/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' .  $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $team->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'member has been updated in team successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such member'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->delete();
            return response()->json([
                'success' => true,
                'msg' => 'member has been deleted from team successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such member'
            ], 404);
        }
    }
}
