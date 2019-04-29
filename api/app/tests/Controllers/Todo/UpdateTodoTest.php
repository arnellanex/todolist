<?php

namespace Tests\Controllers\Todo;

use App\Models\Todo;
use PHPUnit\Framework\Assert;

class UpdateTodoTest extends TodoAbstract
{
    /**
     * Test Create with payload.
     *
     * @return void
     */
    public function testValidPayloadCreate()
    {
        $payload = factory('App\Todo')->make()->toArray();
        
        $this->json('PUT', $this->apiPath, $payload)
             ->seeJsonContains($payload);

    }


}
