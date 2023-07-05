<?php

namespace App\Http\Services\Mail;
use App\Events\SendMailEvent;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Exception;

class MailService
{

    private UserRepository $userRepository;
    private PostRepository $postRepository;

    /**
     * @param UserRepository $userRepository
     * @param PostRepository $postRepository
     */
    public function __construct(UserRepository $userRepository,PostRepository $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @param array $mailTo
     * @throws Exception
     */
    public function sendUserPostsMail(array $mailTo): void
    {

        $users = $this->userRepository->getUsers();
        $posts = $this->postRepository->getPosts();

        $this->userRepository->setRelationships($users,$posts);
        event(new SendMailEvent($users,$mailTo));
    }
}