<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;


use App\Entity\User;

#[AsController]
class CreateUserController extends AbstractController
{

    private $createUserHandler;

    public function __construct(CreateUserHandler $createUserHandler)
    {
        $this->createUserHandler = $createUserHandler;
    }

    public function __invoke(User $data): User
    {
        return $this->createUserHandler->createUser($data);
    }
}

?>