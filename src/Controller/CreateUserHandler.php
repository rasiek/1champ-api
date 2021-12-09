<?php

namespace App\Controller;

use App\Entity\User;


class CreateUserHandler
{

    public function createUser(User $user, UserPasswordHasherInterface $passHasher): User
    {

        $user = new User();
        $user->setUsername($username);

        $hashedPass = $passHasher->hashPassword(
            $user,
            $password
        );
        $user->setPassword($hashedPass);

        return $user;
        
    }

    
}





?>