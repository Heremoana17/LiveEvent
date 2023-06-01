<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositoryArticles = $doctrine->getRepository(Article::class);
        $articles = $repositoryArticles->findAll();
        $repositoryCategories = $doctrine->getRepository(Category::class);
        $categories = $repositoryCategories->findAll();
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
