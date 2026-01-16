<?php

namespace Benchmark\Controllers;

use App\Controllers\BaseController;
use Benchmark\Models\ThreadModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Exceptions\InvalidArgumentException;
use CodeIgniter\HTTP\ResponseInterface;

class Database extends BaseController
{
    public function index(): string
    {
        $db = db_connect();

        $data = [
            'categories' => $db->table('categories')->limit(50)->get()->getResultArray(),
            'threads' => $db->table('threads')->where('category_id', 472)->limit(10)->get()->getResultArray(),
            'posts' => $db->table('posts')->where('category_id', 342)->limit(20)->get()->getResultArray(),
        ];

        return view('Benchmark\Views\database\index', $data);
    }
}
