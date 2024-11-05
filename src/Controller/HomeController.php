<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  #[Route('/', name: 'page_home')]
  public function index(): Response
  {
    return $this->render('home/index.html.twig', [
      'page_title' => 'Réservez votre rendez-vous en ligne',
    ]);
  }
}
