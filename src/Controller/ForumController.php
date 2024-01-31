<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Form\ForumType;
use App\Repository\ForumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ForumController extends AbstractController
{
    #[Route('/forum/{id}', name: 'app_forum')]
    public function index(ForumRepository $forumRepository, int $id): Response
    {
        $forum = $forumRepository->findByID($id);

        if (!$forum) {
            throw $this->createNotFoundException('Forum non trouvé!');
        }

        return $this->render('forumpage/forum.html.twig', [
            'forum' => $forum,
        ]);
    }

    #[Route('/forum/add', name: 'app_forum_add')]
    public function add(Request $request, EntityManagerInterface $entityManager, ForumRepository $forumRepository): Response
    {
        $forum = new Forum();
        $forumForm = $this->createForm(ForumType::class, $forum);
        $forumForm->handleRequest($request);

        if ($forumForm->isSubmitted() && $forumForm->isValid()) {
            $entityManager->persist($forum);
            $entityManager->flush();
            $this->addFlash('success', 'Forum ajouté avec succès!');

            return $this->redirectToRoute('app_forum', [
                'id' => $forum->getId(),
            ]);
        }

        return $this->render('adding/forum.add.html.twig', [
            'forumForm' => $forumForm->createView()
        ]);
    }

    #[Route('/forum/edit', name: 'app_forum_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, ForumRepository $forumRepository, int $id): Response
    {
        $forum = $forumRepository->findByID($id);
        $forumForm = $this->createForm(ForumType::class, $forum);
        $forumForm->handleRequest($request);

        if (!$forum) {
            throw $this->createNotFoundException('Forum non trouvé!');
        }

        if ($forumForm->isSubmitted() && $forumForm->isValid()) {
            $entityManager->persist($forum);
            $entityManager->flush();
            $this->addFlash('success', 'Forum modifié avec succès!');

            return $this->redirectToRoute('app_forum', [
                'id' => $forum->getId(),
            ]);
        }

        return $this->render('editing/forum.edit.html.twig', [
            'forumForm' => $forumForm->createView()
        ]);
    }
}
