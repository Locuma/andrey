<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Services\GreetingGenerator;

class DefaultController extends AbstractController
{
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
    public function homepage(): Response
    {
        return new Response("Dis is homepage");
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