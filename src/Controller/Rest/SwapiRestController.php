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
     * @Rest\Get("/people/{personName}")
     * @throws EntityNotFoundException
     */
    public function getPerson(string $personName): View
    {
        $person = $this->getDoctrine()->getRepository(Person::class)->findByName($personName);
        if (!$person) {
            throw new EntityNotFoundException('person with name '.$personName.' does not exist!');
        }
        return View::create($person, Response::HTTP_OK);
    }

    /**
     * Retrieves all People
     * @Rest\Get("/people")
     */
    public function getPeople(): View
    {
        $people = $this->getDoctrine()->getRepository(Person::class)->findAll();
        return View::create($people, Response::HTTP_OK);
    }
}