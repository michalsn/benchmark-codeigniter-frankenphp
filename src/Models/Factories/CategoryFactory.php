<?php

namespace Benchmark\Models\Factories;

use Benchmark\Entities\Category;
use Benchmark\Models\CategoryModel;
use Faker\Generator;

class CategoryFactory extends CategoryModel
{
    /**
     * Factory method to create a fake categories for testing.
     */
    public function fake(Generator &$faker): Category
    {
        $title = $faker->sentence(3);

        return new Category([
            'title'       => $title,
            'description' => $faker->paragraph(3),
            'parent_id'   => null,
            'order'       => 0,
            'active'      => 1,
            'permissions' => null,
        ]);
    }
}
