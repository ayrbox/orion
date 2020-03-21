<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index() {
        $results = [ 
            array( 
                "name" => "somehing thins",
                "address" => "ktm, nepal",
                "contact_no" => 'asldfk',
                "email" => "test@hotmial.com",
                "note" => "laskjdf aljfd aksjfas fkajs f"
            ),
            array( 
                "name" => "somehing thins",
                "address" => "ktm, nepal",
                "contact_no" => 'asldfk',
                "email" => "test@hotmial.com",
                "note" => "laskjdf aljfd aksjfas fkajs f"
            ),
            array( 
                "name" => "somehing thins",
                "address" => "ktm, nepal",
                "contact_no" => 'asldfk',
                "email" => "test@hotmial.com",
                "note" => "laskjdf aljfd aksjfas fkajs f"
            )
        ];
        return $this->render('search/index.html.twig', [
            'results' => $results 
        ]);
    }
}
