<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\LearningCategory;
use App\Form\FormationType;
use App\Form\LearningCategoryType;
use App\Repository\FormationRepository;
use App\Repository\LearningCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[Route('/admin/formations')]
class FormationController extends AbstractController
{
    #[Route('/', name: 'app_formation_index', methods: ['GET', "POST"])]
    public function index(FormationRepository $formationRepository, LearningCategoryRepository $learningCategoryRepository, Request $request, EntityManagerInterface $em): Response
    {
        $formations = $formationRepository->findBy([]);


        $form = $this->createForm(LearningCategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $learningCategory = $form->getData();
            $em->persist($learningCategory);
            $em->flush();
        }
        return $this->render('admin/formation/index.html.twig', [
            'form' => $form->createView(),
            'learningCategory' => $learningCategoryRepository->findAll(),
            "formations" => $formations
        ]);
    }

    #[Route('/new', name: 'app_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slugger = new AsciiSlugger();
            /**
             * @var Formation $formation
             */
            $formation = $form->getData();
            $formation->setSlug($slugger->slug($formation->getName()));
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('app_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/formation/new.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Formation $formation, FormationRepository $formationRepository): Response
    {
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formationRepository->add($formation, true);

            return $this->redirectToRoute('app_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/formation/edit.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formation_delete', methods: ['POST'])]
    public function delete(Request $request, Formation $formation, FormationRepository $formationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $formation->getId(), $request->request->get('_token'))) {
            $formationRepository->remove($formation, true);
        }

        return $this->redirectToRoute('app_formation_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/learningCategory/{id}', name: 'app_learningCategory_delete')]
    public function learningCategoryDelete(LearningCategory $learningCategory, LearningCategoryRepository $learningCategoryRepository): Response
    {
        $learningCategoryRepository->remove($learningCategory, true);

        return $this->redirectToRoute('app_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
