<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class HomeController
 * @package App\Controller
 *
 * @Route("/", name="home")
 */
class HomeController
{

    /**
     * @Route("/", name="home.index")
     * @return JsonResponse
     */
    public function index() {
       return new JsonResponse(array('hello' => 'symfony'));
    }
}
