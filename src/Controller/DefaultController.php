<?php

namespace App\Controller;

use App\Entity\Box;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $boxes = $this->getDoctrine()->getRepository(Box::class)->findAll();
        $lastBoxes = $this->getDoctrine()->getRepository(Box::class)->findBy([], ["createdAt" => "DESC"], 4);

        return $this->render('default/index.html.twig', [
            'boxes' => $boxes,
            'lastBoxes' => $lastBoxes,
        ]);
    }
}
