<?php

namespace Benchmark\Controllers;

use App\Controllers\BaseController;
use Benchmark\Models\ThreadModel;
use CodeIgniter\Exceptions\InvalidArgumentException;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionObject;

class Session extends BaseController
{
    public function index(): string
    {
        $data = [
            'sample' => 'Sample data to display',
        ];

        session()->set('sampleData', $this->request->getGet('data') ?? 'sample data');

        return view('Benchmark\Views\session\index', $data);
    }


    public function isolation(): ResponseInterface
    {
        $session = session();

        $value = $this->request->getGet('value');
        if ($value !== null) {
            $session->set('test_value', $value);
            $session->set('set_at', time());
        }

        $data = [
            'session_id' => session_id(),
            'stored_value' => $session->get('test_value'),
            'set_at' => $session->get('set_at'),
            'message' => 'Each session should have isolated data. Use different browsers or incognito windows to test.',
        ];

        return $this->response->setJSON($data);
    }
}
