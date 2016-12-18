<?php

namespace App\Repositories\Post;

use App\Helpers\DateHelper;
use App\Models\Comment;
use App\Models\Post;

class EloquentPostRepository implements PostRepositoryContract
{

    /**
     * Retrieves recent posts and stickied ones
     * @param int $limit
     * @return array $posts['sticky' => [...], 'standard' => [...] ]
     */
    public function getAll($limit = 5) {
        $posts['sticky'] = $this->getSticky();
        $posts['standard'] = $this->getStandard($limit);
        return $posts;
    }

    /**
     * Retrieves the most recent Posts that are not sticky
     * @param int $limit
     * @return mixed
     */
    public function getStandard($limit = 5) {
        $posts = Post::orderBy('id', 'desc')
            ->where('sticky', '=', 0)
            ->paginate($limit);
        return $posts;
    }

    /**
     * Retrieves all sticky Posts
     * @return mixed
     */
    public function getSticky() {
        $post = Post::orderBy('id', 'desc')
            ->where('sticky', '=', 1)
            ->get();
        return $post;
    }

    /**
     * @param int $id
     * @param bool $eager Eager load comments?
     * @return array|Post
     */
    public function findById($id, $eager = true, $mutate = false) {
        $post = Post::where('id', '=', $id)
            ->with('comments')
            ->firstOrFail();
        if ($mutate) {
            $postMutated = [
                'id' => $post->id,
                'title' => $post->title,
                'user' => $post->user->name,
                'user_id' => $post->user->id,
                'content' => $post->content,
                'comments' => [],
                'created' => DateHelper::timeElapsed($post->updated_at)
            ];
            foreach ($post->comments as $comment) {
                $postMutated['comments'][] = [
                    'id' => $comment->id,
                    'content' => $comment->content,
                    'user' => $comment->user->name,
                    'date' => date('m-d-y h:ia', strtotime($comment->updated_at))
                ];
            }
            return $postMutated;
        }
        return $post;
    }

    /**
     * @param int $user_id
     * @param array $data
     * @return Post|bool
     */
    public function create($user_id, $data)
    {
        $post = new Post([
            'user_id' => $user_id,
            'title' => $data['title'],
            'type' => $data['type'],
            'sticky' => (isset($data['sticky'])) ? true : false,
            'content' => $data['content']
        ]);
        if ($post->save()) {
            flash('You have successfully posted a new Post!', 'success');
            return $post;
        } else {
            flash('Something went wrong while attempting to create a new Post!', 'danger');
            return false;
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool|Post
     */
    public function update($id, $data)
    {
        $post = $this->findById($id);
        if ($post) {
            $post->title = $data['title'];
            $post->type = $data['type'];
            $post->sticky = (isset($data['sticky'])) ? true : false;
            $post->content = $data['content'];
            $post->save();
            flash('The Post has been updated!', 'success');
            return $post;
        } else {
            flash('Something went wrong while attempting to update the Post!', 'danger');
            return false;
        }
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        $post = $this->findById($id);
        if ($post) {
            $post->delete();
            flash('The Post has been deleted', 'warning');
        }
    }

    /**
     * @param int $post_id
     * @param int $user_id
     * @param array $data
     * @return string
     */
    public function addComment($post_id, $user_id, $data)
    {
        $comment = new Comment([
            'post_id' => $post_id,
            'user_id' => $user_id,
            'content' => $data
        ]);
        if($comment->save()) {
            flash('Your comment has been posted successfully', 'success');
            return 'success';
        } else {
            flash('Something went wrong while trying to post your comment', 'danger');
            return 'fail';
        }
    }



}