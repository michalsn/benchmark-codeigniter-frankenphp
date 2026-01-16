<?php

namespace Benchmark\Config;

$routes->group('benchmark', ['namespace' => 'Benchmark\Controllers'], static function ($routes) {

    $routes->get('cache', 'Cache::index');

    $routes->get('session', 'Session::index');
    $routes->get('session/isolation', 'Session::isolation');
    $routes->get('session/stress', 'Session::stress');
    $routes->get('session/reset', 'Session::reset');

    $routes->get('database', 'Database::index');

    $routes->get('all', 'All::index');
});
