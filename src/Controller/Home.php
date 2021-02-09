<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Home extends AbstractController
{
    public function home(): Response
    {
        $home = 'HomePage';
        return $this->render('home.html.twig', [
            'home' => $home,
        ]);
    }
}