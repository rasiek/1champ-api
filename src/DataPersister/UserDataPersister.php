<?php

use ApiPlatform\Core\DataPersister\DataPersisterInterface;


class UserDataPersister implements DataPersisterInterface
{
    private $entityManager;
    private $userPasswordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher) {
        $this->entityManager = $entityManager;
        $this->$userPasswordHasher = $userPasswordHasher;
    }

    public function supports( $data): bool
    {
        # code...
    }

    /**
     * @param User $data
     */
    public function persist($data)
    {
        if ($data->getPlainPassword()) {
            $data->setPassword(
                $this->userPasswordHasher->hashPassword($data, $data->getPassword())
            );
        }
        $data->eraseCredentials();
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function remove($data)
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }

}




?>