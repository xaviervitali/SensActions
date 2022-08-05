<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\LearningCategory;
use App\Form\ContactType;
use App\Repository\FormationRepository;
use App\Repository\LearningCategoryRepository;
use App\Repository\NewsRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Crypto\DkimSigner;
use Mailjet\Resources;

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
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var Contact $contact
             */
            $contact = $form->getData();
            $message = $contact->getMessage();
            $createdAt = date_format(new DateTime(), "d/m/Y à H:i");
            $mj = new \Mailjet\Client('09c1211f5bbef28cc5462c3af9381dc6', 'e4a930df382c3e8849c8835bcbe40bc0', true, ['version' => 'v3.1']);

            $data = [
                "createdAt" => $createdAt,
                "contactType" => $contact->getContactType(),
                "email" => $contact->getEmail(),
                "phone" => $contact->getPhone(),
                "firstname" => $contact->getFirstname(),
                "lastname" => $contact->getLastname(),
                "message" => nl2br($message),
            ];
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "annebuonomo@sens-actions.fr",
                            'Name' => "sens-actions.fr"
                        ],
                        'To' => [
                            [
                                'Email' => "contact@sens-actions.fr",
                                'Name' => "Contact"
                            ]
                        ],
                        // "CC" => [[
                        //     "Email" => "contact@aggregotech.fr",
                        //     'Name' => "Contact Aggrego-Tech"
                        // ]],
                        'TemplateID' => 4114124,
                        'TemplateLanguage' => true,
                        'Subject' => "Un nouveau contact cherche a vous joindre",
                        'Variables' => json_decode(json_encode($data), true)
                    ]
                ]

            ];
            // $body = [
            //     'Messages' => [
            //         [
            //             'From' => [
            //                 'Email' => "contact@aggregotech.fr",
            //                 'Name' => "Me"
            //             ],
            //             'To' => [
            //                 [
            //                     'Email' => "contact@aggregotech.fr",
            //                     'Name' => "You"
            //                 ]
            //             ],
            //             'Subject' => "My first Mailjet Email!",
            //             'TextPart' => "Greetings from Mailjet!",
            //             'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
            //             <br />May the delivery force be with you!"
            //         ]
            //     ]
            // ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            // dd($mj);
            $response->success() &&  $this->addFlash('success', $message);
            !$response->success() &&  $this->addFlash('danger', "Une erreur est survenue veuillez reesayer ultérieurement");

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
