<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new", name="article_admin_now")
     * @IsGranted("ROLE_ADMIN_ARTICLE")
     */
    public function new(EntityManagerInterface $em)
    {
        die('todo');

        return new Response(sprintf(
            'Hiya! New Article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }

    /**
     * @Route("/admin/article/{id}/edit", name="")
     */
    public function edit(Article $article): Response
    {
        if ($article->getAuthor() != $this->getUser() && !$this->isGranted('ROLE_ADMIN_ARTICLE')) {
            throw $this->createAccessDeniedException('No access!');
        }
        dd($article);
    }
}
