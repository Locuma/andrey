<?php

namespace App\MessageHandler;

use App\Message\CommentMessage;
use App\Repository\CommentRepository;
//use App\SpamChecker;  this doesn't exist in project because I don't want to use external source
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CommentMessageHandler
{
    private $spamChecker;
    private $entityManger;
    private $commentRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        // this class could be working, but I didn't recreate SpamChecker login based on book instructions
    }
}