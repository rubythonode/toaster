<?php

namespace Laralabs\Toaster\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @var
     */
    protected $session;

    /**
     * @var
     */
    protected $toaster;

    /**
     * @var
     */
    protected $converter;

    /**
     * @var
     */
    public $lifetime;

    /**
     * @var
     */
    public $interval;

    public function setUp()
    {
        parent::setUp();

        $this->session = Mockery::spy('Laralabs\Toaster\Interfaces\SessionStore');

        $this->toaster = new Toaster($this->session);
        $this->converter = app('toasterConverter');

        $this->lifetime = config('toaster.toast_lifetime');
        $this->interval = config('toaster.toast_interval');
    }

    protected function getPackageProviders($app)
    {
        return ['Laralabs\Toaster\ToasterServiceProvider'];
    }
}