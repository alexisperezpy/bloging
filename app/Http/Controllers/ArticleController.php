<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index()
    {
        return Article::all();
    }
    
    public function show(Article $article)
    {
        //$article = Article::findOrFail($id);
        return $article;
    }

    public function store(Request $request)
    {
        Article::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Paciente registrado correctamente'
        ], 200);
    }
   
    public function update(Request $request, Article $article)
    {
        //$article = Article::findOrFail($id);
        $article->update($request->all());

        return response()->json([
            'res' => true,
            'msg' => 'Datos del Articulo actualizados correctamente',
            'data' => $article
        ], 201);
    }

    
    public function delete(Article $article)
    {
        //$article = Article::findOrFail($id);
        $article->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Articulo eliminado correctamente'
        ], 200);
    }
}
