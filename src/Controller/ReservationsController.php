<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Repository\ReservationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationsController extends AbstractController
{
  // Afficher toutes les réservations
  #[Route('/reservations/', name: 'page_reservations', methods: 'GET')]
  public function index(ReservationsRepository $repo): Response
  {
    //dd($repo->findAll());
    return $this->render('reservations/index.html.twig', [
      'page_title' => 'Les réservations',
      'reservations' => $repo->findAll(),
    ]);
  }

  // Créer une réservation depuis un créneau donné
  #[Route('/reservation/create/{id}', name: 'reservation_create', requirements: ['id' => '\d+'], methods: 'POST')]
  public function create(ReservationsRepository $repo, $id): Response
  {
    // dump($id, $user);
    // dd($_POST);
    $user = $_POST['user'];
    $repo->createReservationFromSlotIdAndUserId($id, $user);
    // dd($repo->findAll());
    // TODO : Gérer les erreurs ici ou dans le Repository ???
    return $this->redirectToRoute('page_slots');
  }
}
