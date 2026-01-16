<?php

namespace Benchmark\Models\Factories;

use Benchmark\Entities\Post;
use Benchmark\Models\PostModel;
use Faker\Generator;

class PostFactory extends PostModel
{
    /**
     * Factory method to create a fake posts for testing.
     */
    public function fake(Generator &$faker): Post
    {
        return new Post([
            'category_id'   => fake(CategoryFactory::class)->id,
            'thread_id'     => null,
            'reply_to'      => null,
            'author_id'     => 1,
            'editor_id'     => null,
            'edited_at'     => null,
            'edited_reason' => null,
            'body'          => $faker->paragraph(5, true),
            'ip_address'    => $faker->ipv4(),
            'include_sig'   => false,
            'visible'       => true,
        ]);
    }
}
