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

        $form = $this->createForm(SearchFormType::class);

        $resultTest = null;
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $formData = $form->getData();
            $bloodType = $formData["blood_type"];
            $location = $formData["location"];

            $resultTest = $this->statusRepository->searchByLocation($location);

        }

        return $this->render('search/index.html.twig', [
            'searchForm' => $form->createView(),
            'results' => $results,
            'testResult' => $resultTest
        ]);
    }
}
