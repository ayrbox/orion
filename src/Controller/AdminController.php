<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 *
 * @Route("/admin")
 */
class AdminController extends AbstractController
{

    /**
     * @Route("/", name="dashboard")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index() {
        return $this->render('admin/index.html.twig');
    }

}
