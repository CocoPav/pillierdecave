<?php

namespace App\Controller;

use App\Entity\UserBox;
use App\Form\UserBoxType;
use App\Repository\UserBoxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/box")
 */
class UserBoxController extends AbstractController
{
    /**
     * @Route("/", name="user_box_index", methods={"GET"})
     */
    public function index(UserBoxRepository $userBoxRepository): Response
    {
        return $this->render('user_box/index.html.twig', [
            'user_boxes' => $userBoxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_box_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userBox = new UserBox();
        $form = $this->createForm(UserBoxType::class, $userBox);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userBox);
            $entityManager->flush();

            return $this->redirectToRoute('user_box_index');
        }

        return $this->render('user_box/new.html.twig', [
            'user_box' => $userBox,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_box_show", methods={"GET"})
     */
    public function show(UserBox $userBox): Response
    {
        return $this->render('user_box/show.html.twig', [
            'user_box' => $userBox,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_box_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserBox $userBox): Response
    {
        $form = $this->createForm(UserBoxType::class, $userBox);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_box_index', [
                'id' => $userBox->getId(),
            ]);
        }

        return $this->render('user_box/edit.html.twig', [
            'user_box' => $userBox,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_box_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserBox $userBox): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userBox->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userBox);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_box_index');
    }
}
