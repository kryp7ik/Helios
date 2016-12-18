<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Comment\CommentRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepositoryContract $commentRepositoryContract)
    {
        $this->commentRepo = $commentRepositoryContract;
    }


    public function edit($id)
    {
        $comment = $this->commentRepo->findById($id);
        return view('admin.comment.edit', compact('comment'));
    }

    public function update($id, Request $request)
    {
        $this->commentRepo->update($id, $request->all());
        return redirect('/');
    }

    public function delete($id)
    {
        $this->commentRepo->delete($id);
        return redirect('/');
    }

}
