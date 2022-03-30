<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER")
 */
class AccountController extends BaseController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function index(LoggerInterface $logger): Response
    {
        $logger->debug('Checking account page for ' . $this->getUser()->getEmail());

        return $this->render('account/index.html.twig', [
            
        ]);
    }

    /**
     * @Route("/api/account", name="app_account")
     */
    public function accountApi(): Response
    {
        $user = $this->getUser();

        return $this->json($user, 200, [], [
            'groups' => ['main'],
        ]);
    }
}
