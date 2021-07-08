<?php


namespace App\Twig;
use App\Services\GreetingGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GreetExtension extends AbstractExtension
{
    private object $greetingGenerator;

    public function __construct(GreetingGenerator $greetingGenerator)
    {
        $this->greetingGenerator = $greetingGenerator;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('greet',[$this,'greetUser']),
            ];
    }

    public function greetUser($name): string
    {
        $greeting = $this->greetingGenerator->getRandomGreeting();
        return "$greeting dld $name";
    }

}