<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dashRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }

    public function dashLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = $request->all();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'user' => new UserResource(Auth::user()),
            ], 200);
        }

        return response()->json([
            'password' => ['تحقق من الإيميل والرقم السري!']
        ], 404);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function users()
    {
        $users = User::all();
        if (count($users) > 0) {
            return response()->json([
                'success' => true,
                'users' => UserResource::collection($users)
            ], 200);
        }
    }

    public function delUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'user has been deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no user to delete!'
            ], 404);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'user' => []
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $data = $request->all();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'number' => 'required',
            ]);
            $user->update($data);
            return response()->json([
                'success' => true,
                'user' => new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no user!'
            ], 404);
        }
    }
}
