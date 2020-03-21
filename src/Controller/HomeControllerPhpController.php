<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerPhpController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render("home/index.html.twig");
    }

    /**
     * @Route("/search", name="search")
     */
    public function search() {
        return new Response(
            json_encode([
                "search" => "Coming soon"
            ]
        ));
    }
}
