<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\ForumRepository;
use App\Repository\SettingsRepository;
use App\Repository\TagRepository;
use App\Repository\UserRepository;
use App\Repository\VideogameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/home', name: 'app_homepage')]
    public function index(ForumRepository $forumRepository, 
                          CommentRepository $commentRepository, 
                          SettingsRepository $settingsRepository, 
                          TagRepository $tagRepository, 
                          UserRepository $userRepository, 
                          VideogameRepository $videogameRepository): Response

    {

        return $this->render('homepage/index.html.twig', [
            'forums' => $forumRepository->findAll(),
            'comments' => $commentRepository->findAll(),
            'settings' => $settingsRepository->findAll(),
            'tags' => $tagRepository->findAll(),
            'users' => $userRepository->findAll(),
            'videogames' => $videogameRepository->findAll(),
        ]);
    }
}
