<?php

namespace App\Tests\Functional;

use App\Test\CustomApiTestCase;

class TestListingResourceTest extends CustomApiTestCase
{
    public function testCreateTestListing()
    {
        $client = self::createClient();

        $client->request('POST', '/api/tests', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                "name" => "Camilo",
                "phone" => "0699655725",
                "age" => "28",
            ],
        ]);
        $this->assertResponseStatusCodeSame(201);
    }
}



?>