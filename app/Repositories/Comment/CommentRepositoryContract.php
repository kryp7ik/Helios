<?php
/**
 * Created by PhpStorm.
 * User: kryptik
 * Date: 12/16/16
 * Time: 5:28 PM
 */
namespace App\Repositories\Comment;

use App\Models\Comment;

interface CommentRepositoryContract
{
    /**
     * @param int $id
     * @return Comment
     */
    public function findById($id);

    public function update($id, $data);

    public function delete($id);
}