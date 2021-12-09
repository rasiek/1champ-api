<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Tournoi;
use App\Entity\Organizer;
use App\Entity\User;

class TournamentController extends AbstractController
{

    /**
     * @Route("/user", name="user")
     */
    public function create_user(): Response
    {
        $user = new User();

        $user->setUsername('ccamilo');
        $user->setPassword('1234');

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($user);

        $entityManager->flush();

        return new Response('Saved new organizer with id: ' . $user->getId());

    }

    /**
     * @Route("/tournament", name="tournament")
     */
    public function index(): Response
    {
        $organizer = new Organizer();
        $organizer->setName('Camilo');

        $organizer2 = new Organizer();
        $organizer2->setName('Diego');

        $organizer3 = new Organizer();
        $organizer3->setName('Micheline');

        $tour = new Tournoi();
        $tour->setName('2st Tournament');
        $tour->setPlace('1st Albert Place');
        $tour->setDateStart(new \DateTime('9-11-2021'));
        $tour->setDateEnd(new \DateTime('12-11-2021'));
        $tour->setOrganizer($organizer);
        $tour->setDescription('Simple test tournament');
        $tour->setFieldsQty(2);
        $tour->setPlayersQty(4);
        $tour->setGame('volley');

        $tour2 = new Tournoi();
        $tour2->setName('3st Tournament');
        $tour2->setPlace('1st Albert Place');
        $tour2->setDateStart(new \DateTime('9-11-2021'));
        $tour2->setDateEnd(new \DateTime('12-11-2021'));
        $tour2->setOrganizer($organizer2);
        $tour2->setDescription('Simple test tournament');
        $tour2->setFieldsQty(2);
        $tour2->setPlayersQty(4);
        $tour2->setGame('volley');

        $tour3 = new Tournoi();
        $tour3->setName('4st Tournament');
        $tour3->setPlace('1st Albert Place');
        $tour3->setDateStart(new \DateTime('9-11-2021'));
        $tour3->setDateEnd(new \DateTime('12-11-2021'));
        $tour3->setOrganizer($organizer2);
        $tour3->setDescription('Simple test tournament');
        $tour3->setFieldsQty(2);
        $tour3->setPlayersQty(4);
        $tour3->setGame('volley');

        $tour4 = new Tournoi();
        $tour4->setName('5st Tournament');
        $tour4->setPlace('1st Albert Place');
        $tour4->setDateStart(new \DateTime('9-11-2021'));
        $tour4->setDateEnd(new \DateTime('12-11-2021'));
        $tour4->setOrganizer($organizer3);
        $tour4->setDescription('Simple test tournament');
        $tour4->setFieldsQty(2);
        $tour4->setPlayersQty(4);
        $tour4->setGame('volley');


        $tour5 = new Tournoi();
        $tour5->setName('6st Tournament');
        $tour5->setPlace('1st Albert Place');
        $tour5->setDateStart(new \DateTime('9-11-2021'));
        $tour5->setDateEnd(new \DateTime('12-11-2021'));
        $tour5->setOrganizer($organizer3);
        $tour5->setDescription('Simple test tournament');
        $tour5->setFieldsQty(2);
        $tour5->setPlayersQty(4);
        $tour5->setGame('volley');

        $tour6 = new Tournoi();
        $tour6->setName('7st Tournament');
        $tour6->setPlace('1st Albert Place');
        $tour6->setDateStart(new \DateTime('9-11-2021'));
        $tour6->setDateEnd(new \DateTime('12-11-2021'));
        $tour6->setOrganizer($organizer);
        $tour6->setDescription('Simple test tournament');
        $tour6->setFieldsQty(2);
        $tour6->setPlayersQty(4);
        $tour6->setGame('volley');


        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($organizer);
        $entityManager->persist($organizer2);
        $entityManager->persist($organizer3);
        $entityManager->persist($tour);
        $entityManager->persist($tour2);
        $entityManager->persist($tour3);
        $entityManager->persist($tour4);
        $entityManager->persist($tour5);
        $entityManager->persist($tour6);

        $entityManager->flush();

        return new Response('Saved new organizer with id: $organizer->getId()');
    }
}
