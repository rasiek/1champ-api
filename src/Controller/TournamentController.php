<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Tournoi;
use App\Entity\Organizer;

class TournamentController extends AbstractController
{
    /**
     * @Route("/tournament", name="tournament")
     */
    public function index(): Response
    {
        $organizer = new Organizer();
        $organizer->setName('Cristhian');

        $tour = new Tournoi();
        $tour->setName('1st Tournament');
        $tour->setPlace('1st Albert Place');
        $tour->setDateStart(new \DateTime('9-11-2021'));
        $tour->setDateEnd(new \DateTime('12-11-2021'));
        $tour->setOrganizer($organizer);
        $tour->setDescription('Simple test tournament');
        $tour->setFieldsQty(2);
        $tour->setPlayersQty(4);
        $tour->setGame('volley');


        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($organizer);
        $entityManager->persist($tour);

        $entityManager->flush();

        return new Response('Saved new organizer with id: $organizer->getId()');
    }
}
