<?php

namespace Benchmark\Models;

use Benchmark\Entities\Post;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Post::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id', 'thread_id', 'reply_to', 'author_id', 'editor_id', 'edited_at', 'edited_reason', 'body', 'ip_address', 'include_sig', 'visible', 'markup', 'reaction_count', 'marked_as_deleted', 'marked_as_answer',
    ];
    protected $useTimestamps        = true;
    protected $cleanValidationRules = false;


    /**
     * Scope method to only return visible posts.
     *
     * Example:
     *  $posts = model(PostModel::class)->visible()->findAll();
     */
    public function visible()
    {
        return $this->where('visible', true);
    }

    /**
     * Scope method to only return top level posts.
     *
     * Example:
     *  $posts = model(PostModel::class)->main()->findAll();
     */
    public function main()
    {
        return $this->where('reply_to', null);
    }

    /**
     * Scope method to return all post related data.
     *
     * Example:
     *  $posts = model(PostModel::class)->posts()->findAll();
     */
    public function posts()
    {
        $selects = [
            'posts.*',
            'categories.title AS category_title',
            'categories.slug AS category_slug',
            'threads.title AS thread_title',
            'threads.slug AS thread_slug',
        ];

        return $this
            ->select(implode(', ', $selects))
            ->join('categories', 'categories.id = posts.category_id', 'left')
            ->join('threads', 'threads.id = posts.thread_id', 'left');
    }
}
