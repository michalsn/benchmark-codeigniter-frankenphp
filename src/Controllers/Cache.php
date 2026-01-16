<?php

namespace Benchmark\Controllers;

use App\Controllers\BaseController;
use Benchmark\Models\ThreadModel;
use CodeIgniter\Exceptions\InvalidArgumentException;
use CodeIgniter\HTTP\ResponseInterface;

class Cache extends BaseController
{
    public function index(): string
    {
        $data = [
            'sample' => 'sample data from deleted cache',
        ];

        cache()->save('threads', $data);

        cache()->delete('threads');

        return view('Benchmark\Views\cache\index', $data);
    }
}
