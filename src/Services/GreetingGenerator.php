<?php


namespace App\Services;


use Psr\Log\LoggerInterface;
use Doctrine\ORM\Mapping as ORM;


class GreetingGenerator
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getRandomGreeting():string
    {
        $greetings = ['Hello', 'Yo', 'Aloga','Privet'];
        $className = get_class();

        $this->logger->info("this random message from $className");
        return $greetings[array_rand($greetings)];
    }

}