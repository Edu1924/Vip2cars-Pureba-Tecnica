<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Post\CreatePostRequest;
use App\Services\Post\PostService;

class PostController extends Controller
{

    public function __construct(private PostService $postService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->index();
        return view('registro-vehículos', compact('posts'));
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
    public function store(CreatePostRequest $request)
    {               
        $this->postService->createPost($request->validated());

        return redirect()->route('registro.index')->with('success', 'Vehículo registrado exitosamente.');
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
        $post = \App\Models\Carro::with('cliente')->findOrFail($id);
        // We can reuse the same view for editing, just passing the $post to it
        $posts = $this->postService->index();
        return view('registro-vehículos', compact('posts', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePostRequest $request, string $id)
    {
        $this->postService->updatePost($request->validated(), $id);
        return redirect()->route('registro.index')->with('success', 'Vehículo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postService->deletePost($id);
        return redirect()->route('registro.index')->with('success', 'Vehículo eliminado exitosamente.');
    }
}
