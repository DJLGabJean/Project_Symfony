<?php

namespace App\Controller;

use App\Repository\ForumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    #[Route('/forum/{id}', name: 'app_forum_{id}')]
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
}
