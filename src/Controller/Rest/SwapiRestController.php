<?php

namespace App\Controller\Rest;

use App\Services\TokenService;
use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Person;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SwapiRestController extends AbstractFOSRestController
{
    /**
     * @param Request $request
     * @param string $personName
     * @return View
     * @Rest\Get("/people/{personName}")
     * @throws EntityNotFoundException
     */
    public function getPerson(Request $request, string $personName): View
    {
        if (!(new TokenService())->isTokenValid($request->query->get('oauth_token'))) {
            throw new AccessDeniedHttpException;
        }
        $person = $this->getDoctrine()->getRepository(Person::class)->findByName($personName);
        if (!$person) {
            throw new EntityNotFoundException('person with name ' . $personName . ' does not exist!');
        }
        return View::create($person, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @Rest\Get("/people")
     * @return View
     */
    public function getPeople(Request $request): View
    {
        if (!(new TokenService())->isTokenValid($request->query->get('oauth_token'))) {
            throw new AccessDeniedHttpException;
        }
        $people = $this->getDoctrine()->getRepository(Person::class)->findAll();
        return View::create($people, Response::HTTP_OK);
    }
}