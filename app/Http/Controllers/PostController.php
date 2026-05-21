<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostWithAttachmentsRequest;
use App\Models\Post;
use App\Services\FileService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $fileService;

    public function __construct()
    {
        $this->fileService = new FileService();
    }

    public function store(StorePostWithAttachmentsRequest $request)
    {
        // El usuario logueado crea la publicación básica
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        // Si la petición contiene archivos, el servicio los procesa y asocia
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $this->fileService->storeAttachment($file, $post->id);
            }
        }

        return response()->json([
            'message' => 'Post creado con éxito junto a sus archivos',
            'post' => $post->load('attachments')
        ], 201);
    }
    public function index()
    {
        $posts = Post::with(['author', 'category'])
                    ->latest()
                    ->paginate(5);
        return view('posts.index', compact('posts'));
    }
}