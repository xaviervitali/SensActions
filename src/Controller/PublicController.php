<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\LearningCategory;
use App\Form\ContactType;
use App\Repository\FormationRepository;
use App\Repository\LearningCategoryRepository;
use App\Repository\NewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('public/accueil.html.twig');
    }

    #[Route('/formations', name: 'formations')]
    public function formations(LearningCategoryRepository $learningCategoryRepository, FormationRepository $formationRepository): Response
    {
        $learningCategories = $learningCategoryRepository->findAll();
        $filteredCategories = [];
        foreach ($learningCategories as $category) {
            /**
             * @var LearningCategory $category
             */
            if (count(array_filter($category->getFormations()->toArray(), function ($formation) {
                return $formation->isEnabled();
            })) > 0) {
                $filteredCategories[] = $category;
            };
        }
        return $this->render('public/formations.html.twig', ["learningCategories" => $filteredCategories, "formations" => $formationRepository->findBy(["enabled" => true])]);
    }

    // #[Route('/formation', name: 'formation')]
    // public function formation(): Response
    // {
    //     return $this->render('public/formation.html.twig');
    // }
    #[Route('/formation/{slug}', name: 'app_formation_show', methods: ['GET'])]
    public function show(Formation $formation): Response
    {
        return $this->render('public/formation.html.twig', [
            'formation' => $formation,
        ]);
    }

    #[Route('/accompagnement', name: 'accompagnement')]
    public function accompagnement(): Response
    {
        return $this->render('public/accompagnement.html.twig');
    }
    #[Route('/actualites', name: 'actualites')]
    public function actualites(NewsRepository $newsRepository): Response
    {
        return $this->render('public/actualites.html.twig', ["news" => $newsRepository->findBy([])]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $message = $contact->getMessage();
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', $message);
            return $this->render('public/contact.html.twig', ["form" => $form->createView()]);
        }
        return $this->render('public/contact.html.twig', ["form" => $form->createView()]);
    }

    #[Route('/mentionsLegales', name: 'mentionsLegales')]
    public function mentionsLegales(): Response
    {
        return $this->render('public/mentionsLegales.html.twig');
    }

    #[Route('/cgv', name: 'cgv')]
    public function cgv(): Response
    {
        return $this->render('public/cgv.html.twig');
    }

    #[Route("/recherche", name: "app_query")]
    public function query(Request $request, FormationRepository $formationRepository,)
    {
        $query = $request->query->get("query");
        $results = [];
        if ($query) {
            $results = $formationRepository->findInGoals($query);
        }
        return $this->render('public/results.html.twig', ["results" => $results, "formations" => $formationRepository->findBy(["enabled" => true])]);
    }
}
