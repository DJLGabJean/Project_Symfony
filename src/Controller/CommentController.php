<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/comment/add', name: 'app_comment_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Commentaire ajouté avec succès!');

            return $this->redirectToRoute('app_homepage', []);
        }

        return $this->render('adding/comment.add.html.twig', [
            'commentForm' => $commentForm->createView()
        ]);
    }
}
