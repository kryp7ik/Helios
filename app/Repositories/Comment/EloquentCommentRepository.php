<?php

namespace App\Repositories\Comment;

use App\Helpers\DateHelper;
use App\Models\Comment;

class EloquentCommentRepository implements CommentRepositoryContract
{

    /**
     * @param int $id
     * @return Comment
     */
    public function findById($id)
    {
        $comment = Comment::where('id', '=', $id)->firstOrFail();
        return $comment;
    }

    public function update($id, $data)
    {
        $comment = $this->findById($id);
        if ($comment) {
            $comment->content = $data['content'];
            $comment->save();
            flash('Your comment has been updated!', 'success');
        }
    }

    public function delete($id)
    {
        $comment = $this->findById($id);
        if($comment) {
            $comment->delete();
            return true;
        }
        return false;
    }

}