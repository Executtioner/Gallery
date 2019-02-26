<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findBy(['isActive' => true], ['titulo' => 'ASC']);

        return $this->render('home/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
