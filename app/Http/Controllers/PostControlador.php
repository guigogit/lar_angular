<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();

        $path = $request->file('arquivo')->store('imagens', 'public');

        $post->nome      = $request->nome;
        $post->email     = $request->email;
        $post->titulo    = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->mensagem  = $request->mensagem;
        $post->path      = $path;
        $post->likes     = 0;

        $post->save();
        return response($post, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (isset($post)){
            storage::disk('public')->delete($post->arquivo);


            $post->delete();
            return 204;
        }
        return response('Post nao encontrado', 404);
    }

    public function like($id)
    {
        $post = Post::find($id);
        if (isset($post)){
           $post->likes++;
           $post->save();
           return $post->id;
        }
        return response('ID não encontrado',404);
    }
}
