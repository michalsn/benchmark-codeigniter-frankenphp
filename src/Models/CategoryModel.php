<?php

namespace Benchmark\Models;

use Benchmark\Concerns\Sluggable;
use Benchmark\Entities\Category;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    use Sluggable;

    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Category::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'slug', 'description', 'parent_id', 'order', 'active', 'private',
        'thread_count', 'post_count', 'permissions', 'last_thread_id',
    ];
    protected $useTimestamps = true;
    protected $beforeInsert  = ['generateSlug'];

    /**
     * Scope method to only return active categories.
     *
     * Example:
     *  $categories = model(CategoryModel::class)->active()->findAll();
     */
    public function active()
    {
        return $this->where('categories.active', 1);
    }

    /**
     * Scope method to only return public categories.
     *
     * Example:
     *  $categories = model(CategoryModel::class)->public()->findAll();
     */
    public function public()
    {
        return $this->where('categories.private', 0);
    }

    /**
     * Scope method to only return categories with no parent.
     *
     * Example:
     *  $categories = model(CategoryModel::class)->parents()->findAll();
     */
    public function parents()
    {
        return $this->where('categories.parent_id', null);
    }

    /**
     * Scope method to only return categories with a parent.
     *
     * Example:
     *  $categories = model(CategoryModel::class)->children()->findAll();
     */
    public function children()
    {
        return $this->where('parent_id !=', null);
    }
}
