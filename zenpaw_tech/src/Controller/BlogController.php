<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PostRepository;
use App\Entity\Post;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['publishedAt' => 'DESC']);
        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/post/{slug}', name: 'app_blog_show')]
    public function show(PostRepository $postRepository, string $slug): Response
    {
        $post = $postRepository->findOneBy(['slug' => $slug]);
        if (!$post) {
            throw $this->createNotFoundException('El post no existe');
        }
        return $this->render('blog/show.html.twig', [
            'post' => $post,
        ]);
    }
}
