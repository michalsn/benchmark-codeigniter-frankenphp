<?php

namespace Benchmark\Controllers;

use App\Controllers\BaseController;
use Benchmark\Models\ThreadModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Exceptions\InvalidArgumentException;
use CodeIgniter\HTTP\ResponseInterface;

class All extends BaseController
{
    public function index(): string
    {
        $db = db_connect();

        $data = [
            'categories' => $db->table('categories')->limit(50)->get()->getResultArray(),
            'threads' => $db->table('threads')->limit(10)->get()->getResultArray(),
            'posts' => $db->table('posts')->limit(20)->get()->getResultArray(),
            'sample' => 'We are using database, session, and cache in this endpoint',
        ];

        cache()->save('threads', $data);

        cache()->delete('threads');

        session()->set('sampleData', $this->request->getGet('data') ?? 'sample data');

        return view('Benchmark\Views\all\index', $data);
    }
}
