<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Post\PostRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepositoryContract $postRepositoryContract)
    {
        $this->postRepo = $postRepositoryContract;
    }

    public function create()
    {
        return view('admin.post.create');
    }


    public function store(Request $request)
    {
        $this->postRepo->create(Auth::user()->id, $request->all());
        return redirect('/');
    }

    public function show($id)
    {
        $post = $this->postRepo->findById($id, true, true);
        return response()->json($post);
    }

    public function edit($id)
    {
        $post = $this->postRepo->findById($id, false, false);
        return view('admin.post.edit', compact('post'));
    }

    public function update($id, Request $request)
    {
        $this->postRepo->update($id, $request->all());
        return redirect('/');
    }

    public function delete($id)
    {
        $this->postRepo->delete($id);
        return redirect('/');
    }

    public function addComment($id, Request $request)
    {
        $status = $this->postRepo->addComment($id, Auth::user()->id, $request->get('content'));
        return response()->json($status);
    }

}
