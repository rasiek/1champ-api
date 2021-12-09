<?php

namespace App\Test;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;

class CustomApiTestCase extends ApiTestCase
{
    protected function createUser(string $username, string $pass): User
    {
        $user = new User();
        $user.setUsername($username);
        $user->setPassword($pass);

        $em = self::$container->get('doctrine')->getManager();
        $em->persist($user);
        $em->flush();

        return $user;
    }

    protected function logIn(Client $client, string $username, string $password)
    {
        $client->request('POST', '/login_check', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'username' => $username,
                'password' => $password
            ],
        ]);
        $this->assertResponseStatusCodeSame(204);
    }
}



?>