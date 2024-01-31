<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\SettingsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    #[Route('/settings/add', name: 'app_settings_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $settings = new Settings();
        $settingsForm = $this->createForm(SettingsType::class, $settings);
        $settingsForm->handleRequest($request);

        if ($settingsForm->isSubmitted() && $settingsForm->isValid()) {
            $entityManager->persist($settings);
            $entityManager->flush();
            $this->addFlash('success', 'Paramètres ajoutés avec succès!');

            return $this->redirectToRoute('app_homepage', []);
        }

        return $this->render('adding/settings.add.html.twig', [
            'settingsForm' => $settingsForm->createView()
        ]);
    }
}
