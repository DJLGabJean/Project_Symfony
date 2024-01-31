<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\TagType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    #[Route('/tag/add', name: 'app_tag_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tag = new Tag();
        $tagForm = $this->createForm(TagType::class, $tag);
        $tagForm->handleRequest($request);

        if ($tagForm->isSubmitted() && $tagForm->isValid()) {
            $entityManager->persist($tag);
            $entityManager->flush();
            $this->addFlash('success', 'Tag ajouté avec succès!');

            return $this->redirectToRoute('app_homepage', []);
        }

        return $this->render('adding/tag.add.html.twig', [
            'tagForm' => $tagForm->createView()
        ]);
    }
}
