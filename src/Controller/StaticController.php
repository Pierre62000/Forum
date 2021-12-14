<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    #[Route('/accueil', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('static/accueil.html.twig', []);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('static/login.html.twig', []);
    }

    #[Route('/inscription', name: 'inscription')]
    public function inscription(): Response
    {
        date_default_timezone_set('Europe/Paris');

        return $this->render('static/inscription.html.twig', []);
    }
}
