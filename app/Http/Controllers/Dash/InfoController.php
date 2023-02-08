<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\InfoResource;
use App\Models\App;
use App\Models\AppCat;
use App\Models\Article;
use App\Models\Graphic;
use App\Models\GraphicCat;
use App\Models\Info;
use App\Models\Motion;
use App\Models\MotionCat;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Team;
use App\Models\User;
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

    public function all(){
        $users = User::all();
        $team = Team::all();
        $partners = Partner::all();
        $articles = Article::all();
        $appCats = AppCat::all();
        $motionCats = MotionCat::all();
        $graphicCats = GraphicCat::all();
        $apps = App::all();
        $videos = Motion::all();
        $graphics = Graphic::all();
        $services = Service::all();
        $products = Product::all();
        return response()->json([
            'success' => true,
            'users' => count($users),
            'team' => count($team),
            'partners' => count($partners),
            'articles' => count($articles),
            'appCats' => count($appCats),
            'motionCats' => count($motionCats),
            'graphicCats' => count($graphicCats),
            'apps' => count($apps),
            'videos' => count($videos),
            'graphics' => count($graphics),
            'services' => count($services),
            'products' => count($products),
        ], 200);
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
