<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Repository\ReserveBloodStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController {

    /**
     * @var ReserveBloodStatusRepositoryry
     */
    private $statusRepository;

    public function __construct(ReserveBloodStatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }


    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request) {

        $results = null;

        $form = $this->createForm(SearchFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $formData = $form->getData();
            $bloodType = $formData["blood_type"];
            $location = $formData["location"];
            $results= $this->statusRepository->searchByLocation(
                $bloodType,
                $location
            );
        }

        return $this->render('search/index.html.twig', [
            'searchForm' => $form->createView(),
            'results' => $results,
        ]);
    }
}
