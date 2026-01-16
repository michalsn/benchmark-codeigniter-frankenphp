<?php

namespace Benchmark\Entities;

use Benchmark\Models\CategoryModel;
use Benchmark\Models\ThreadModel;
use CodeIgniter\Entity\Entity;

class Post extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at', 'edited_at', 'marked_as_deleted', 'marked_as_answer'];
    protected $casts   = [
        'id'          => 'integer',
        'category_id' => 'integer',
        'thread_id'   => 'integer',
        'reply_to'    => '?integer',
        'author_id'   => 'integer',
        'editor_id'   => 'integer',
        'include_sig' => 'boolean',
        'visible'     => 'boolean',
    ];
}
