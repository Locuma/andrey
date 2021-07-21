<?php


namespace App\Controller;

use App\Entity\Conference;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Services\GreetingGenerator;
use Twig\Environment;
use App\EventSubscriber\TwigEventSubscriber;

class DefaultController extends AbstractController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $name
     * @param GreetingGenerator $greetingGenerator
     * @return Response
     * @Route("/hello/{name}")
     */
    public function index($name, GreetingGenerator $greetingGenerator): Response
    {
        $randomGreeting = $greetingGenerator->getRandomGreeting();

        return new Response("$randomGreeting world, greeting $name");
    }

    /**
     * @Route ("/", name="homepage")
     */
    public function homepage(ConferenceRepository $conferenceRepository): Response
    {
//        return new Response("Dis is homepage");
//        return new Response($this->twig->render('base.html.twig',
//            [
//                'conferences'=>$conferences
//            ]));

        return new Response($this->twig->render('base.html.twig'));

//        return new Response($this->twig->render('base.html.twig', [
//            'conferences'=>$conferenceRepository->findAll(),
//            ]));

    }

    /**
     * @return Response
     * @Route ("/twig/{variable}")
     */
    public function easy($variable)
    {
        return $this->render('default/index.html.twig', [
            'name' => $variable,
        ]);
    }

    /**
     * @Route ("/logger/{name}")
     */
    public function logger($name, LoggerInterface $logger)
    {
        $logger->info("say hello to my little $name");
        return new Response("page with logger!");
    }
}