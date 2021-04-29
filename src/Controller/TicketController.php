<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Ticket;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/tickets", name="ticket")
     */
    public function index()
    {

        $tickets = $this->entityManager->getRepository(Ticket::class)->findAll();

        return $this->render('ticket/index.html.twig');
    }


    /**
     * @Route("/Un-ticket/{id}", name="ticket")
     */
    public function show($id): Response
    {

            $ticket = $this->entityManager->getRepository(Ticket::class)->findOneBySlug($id);
        if (!$ticket) {
            return $this->redirectToRoute('tickets');
        }

        return $this->render('article/show.html.twig', [
            'ticket' => $ticket
        ]);
    }
}
