<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function __construct()
    {
        parent::__construct();

        if (!defined('LARAVEL_START')) {
            define('LARAVEL_START', microtime(true));
        }
    }
}
