<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);
        if (count($articles) > 0) {
            return ArticleResource::collection($articles);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no articles yet'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'banner' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/articles/images/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $path = 'storage/images/articles/banners/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['banner'] = $name;
        }
        Article::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'article has been addedd successfully'
        ], 200);
    }

    public function show($id)
    {
        $article = Article::find($id);
        if ($article) {
            return response()->json([
                'success' => true,
                'article' => new ArticleResource($article)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such article'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article) {
            $request->validate([
                'title' => 'required',
                'desc' => 'required',
            ]);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/images/articles/imgages/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $path = 'storage/images/articles/banners/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['banner'] = $name;
            }
            $article->update($data);
            return response()->json([
                'success' => true,
                'msg' => 'article has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such article'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return response()->json([
                'success' => true,
                'msg' => 'article has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such article'
            ], 404);
        }
    }
}
