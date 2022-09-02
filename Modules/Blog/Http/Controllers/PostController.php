<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Validator;

use Modules\Blog\Services\PostService;

class PostController extends Controller
{
    
    /**
     * @var postService
     */
    protected $postService;

    /**
     * PostController Constructor
     *
     * @param PostService $postService
     *
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = $this->postService->getAll();
        return view('blog::post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::post.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'content',
            'url',
        ]);

        $post = $this->postService->add($data);

        return redirect()->route('post.index')->with(['success' => 'Udalo sie']); 
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($url)
    {
        //$post = Post::whereUrl($url)->first();
        $post = $this->postService->get($url);
        return view('blog::post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blog::post.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|email',
			'content' => 'required|email',
			'url' => 'required|min:3|max:255',
        ]);
    }
}
