<?php

namespace App\Controller;

use App\Entity\LearningCategory;
use App\Repository\LearningCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/createFormationsThemes', name: 'createFormationsThemes')]
    public function createFormationsThemes(EntityManagerInterface $em, LearningCategoryRepository $learningCategoryRepository): Response
    {
        $themes = [
            "Risques physiques",
            "Risques psychosociaux",
            "prévention",
            "formations des formateurs",
            "instances du personnel",
            "management / communication",
            "secourisme",
        ];

        foreach ($themes as $theme) {
            if (!$learningCategoryRepository->findOneBy(["name" => $theme])) {
                $learningCategory = new LearningCategory;
                $learningCategory->setName($theme);
                $em->persist($learningCategory);
            }
        }
        $em->flush();
        return $this->redirectToRoute("app_formation_index");
    }
}
