<?php

namespace App\Controller;

use App\Form\VideogameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Videogame;

class VideogameController extends AbstractController
{
    #[Route('/videogame/add', name: 'app_videogame_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $videogame = new Videogame();
        $videogameForm = $this->createForm(VideogameType::class, $videogame);
        $videogameForm->handleRequest($request);

        if ($videogameForm->isSubmitted() && $videogameForm->isValid()) {
            $entityManager->persist($videogame);
            $entityManager->flush();
            $this->addFlash('success', 'Jeu vidéo ajouté avec succès!');

            return $this->redirectToRoute('app_homepage', []);
        }

        return $this->render('adding/videogame.add.html.twig', [
            'videogameForm' => $videogameForm->createView()
        ]);
    }
}
