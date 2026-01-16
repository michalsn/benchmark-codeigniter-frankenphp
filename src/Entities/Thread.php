<?php

namespace Benchmark\Entities;

use Benchmark\Models\CategoryModel;
use CodeIgniter\Entity\Entity;

class Thread extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at', 'edited_at'];
    protected $casts   = [
        'category_id'    => 'integer',
        'author_id'      => 'integer',
        'editor_id'      => 'integer',
        'views'          => 'integer',
        'closed'         => 'boolean',
        'sticky'         => 'boolean',
        'visible'        => 'boolean',
        'last_post_id'   => '?integer',
        'post_count'     => 'integer',
        'answer_post_id' => '?integer',
    ];
}
