<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 16.03.19
 * Time: 19:27
 */

namespace App\Controller\Rest;

use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Person;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class SwapiRestController extends AbstractFOSRestController
{
    /**
     * Retrieves an Article resource
     * @Rest\Get("/articles/{articleId}")
     */
    public function getArticle(int $articleId): View
    {
        $product = $this->getDoctrine()
            ->getRepository(Person::class)->find(1);
        // In case our GET was a success we need to return a 200 HTTP OK response with the request object
        return View::create($product, Response::HTTP_OK);
    }
}