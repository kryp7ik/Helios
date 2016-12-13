<?php
/**
 * Created by PhpStorm.
 * User: kryptik
 * Date: 12/13/16
 * Time: 2:10 PM
 */
namespace App\Repositories\Post;

use App\Models\Post;

interface PostRepositoryContract
{
    /**
     * Retrieves recent posts and stickied ones
     * @param int $limit
     * @return array $posts['sticky' => [...], 'standard' => [...] ]
     */
    public function getAll($limit = 5);

    /**
     * Retrieves the most recent Posts that are not sticky
     * @param int $limit
     * @return mixed
     */
    public function getStandard($limit = 5);

    /**
     * Retrieves all sticky Posts
     * @return mixed
     */
    public function getSticky();

    /**
     * @param int $id
     * @param bool $eager Eager load comments?
     * @return array|Post
     */
    public function findById($id, $eager = true, $mutate = false);

    /**
     * @param int $user_id
     * @param array $data
     * @return Post|bool
     */
    public function create($user_id, $data);

    /**
     * @param int $id
     * @param array $data
     * @return bool|Post
     */
    public function update($id, $data);

    /**
     * @param int $id
     */
    public function delete($id);

    /**
     * @param int $post_id
     * @param int $user_id
     * @param array $data
     * @return string
     */
    public function addComment($post_id, $user_id, $data);
}