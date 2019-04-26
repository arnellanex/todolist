<?php

namespace Tests\Controllers\Todo;

use App\Models\Todo;
use Faker\Factory;
use Tests\TestCase;

class TodoAbstract extends TestCase
{
    /**
     * @var \Faker\Generator
     */
    public $faker;
    public $apiPath;
    public $domain = 'todo';

    /**
     * HTTP Status Code 'Success'.
     */
    const STATUS_SUCCESS = 200;

    public function setUp(): void
    {
        parent::setUp();

        $this->createApplication();
        $this->faker = Factory::create();
        $this->setApiUrlPath($this->domain);
    }
    
    /**
     * Api Path.
     *
     * @param $path
     */
    public function setApiUrlPath($path)
    {
        $this->apiPath = sprintf('%s/%s/%s',
            'http://localhost',
            'api/v1',
            $path
        );
    }
}
