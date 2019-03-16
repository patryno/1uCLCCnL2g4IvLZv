<?php

namespace App\Controller\Web;

use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SwapiController extends AbstractController
{
    /**
     * @Route("/swapi", name="swapi")
     */
    public function index($name = null)
    {
        //$personRepository = $this->getDoctrine()->getRepository(PersonRepository::class)->find(1);
        http_response_code(404);

        return $this->render('swapi/index.html.twig', [
            'controller_name' => 'SwapiController',
        ]);
    }

    /**
     * @Route("/name/{id}", name="name_show")
     */
    public function show($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(Person::class)->find(1);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $product;

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
