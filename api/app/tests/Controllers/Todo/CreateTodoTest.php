<?php

namespace Tests\Controllers\Todo;

use App\Models\Todo;
use PHPUnit\Framework\Assert;

class CreateTodoTest extends TodoAbstract
{
    /**
     * Test Create with no payload.
     *
     * @return void
     */
    public function testNoPayload()
    {
        $payload = [];

        $this->json('POST', $this->apiPath, $payload)
            ->seeStatusCode(['code' => 422])
            ->seeJsonStructure(['code', 'message']);
    }

    /**
     * Test Create with payload.
     *
     * @return void
     */
    public function testValidPayloadCreate()
    {
        $payload = factory('App\Todo')->make()->toArray();

        print_r($payload);
        
        $this->json('POST', $this->apiPath, $payload)
             ->seeStatusCode(self::STATUS_SUCCESS)
             ->seeJsonStructure(['title', 'completed']);

    }


}
