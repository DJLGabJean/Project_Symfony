<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Videogame;

class VideogameController extends AbstractController
{
    #[Route("/videogame/add", name:"add_videogame", methods:"POST")]
    public function addVideogame(Request $request, EntityManagerInterface $entityManager): Response
    {
        $name = $request->request->get('name');

        $videogame = new Videogame();
        $videogame->getId();
        $videogame->setName($name);

        $entityManager->persist($videogame);
        $entityManager->flush();

        return $this->redirectToRoute('forum_homepage');
    }
}
