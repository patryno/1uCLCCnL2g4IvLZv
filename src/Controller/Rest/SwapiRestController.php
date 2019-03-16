<?php

namespace App\Controller\Rest;

use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Person;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class SwapiRestController extends AbstractFOSRestController
{
    /**
     * Retrieves all information about Person
     * @Rest\Get("/articles/{articleId}")
     * @throws EntityNotFoundException
     */
    public function getArticle(int $articleId): View
    {
        $product = $this->getDoctrine()->getRepository(Person::class)->find($articleId);
        if (!$product) {
            throw new EntityNotFoundException('Article with id '.$articleId.' does not exist!');
        }
        return View::create($product, Response::HTTP_OK);
    }

    /**
     * Retrieves all Persons
     * @Rest\Get("/articles")
     */
    public function getArticles(): View
    {
        $products = $this->getDoctrine()->getRepository(Person::class)->findAll();
        return View::create($products, Response::HTTP_OK);
    }
}