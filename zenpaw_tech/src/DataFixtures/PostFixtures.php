<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();
        $postsData = [
            [
                'title' => 'Bienvenido a ZenPaw Tech',
                'slug' => 'bienvenido-zenpaw-tech',
                'summary' => '¡Este es el primer post de nuestro blog minimalista sobre desarrollo de software!',
                'content' => "¡Hola mundo!\nEste es el contenido completo del primer post.",
                'publishedAt' => $now->modify('-2 days'),
            ],
            [
                'title' => 'Symfony 8: Novedades',
                'slug' => 'symfony-8-novedades',
                'summary' => 'Descubre las principales novedades de Symfony 8 en este artículo.',
                'content' => "Symfony 8 trae muchas mejoras...\n¡Descúbrelas aquí!",
                'publishedAt' => $now->modify('-1 day'),
            ],
            [
                'title' => 'Twig: Plantillas Modernas',
                'slug' => 'twig-plantillas-modernas',
                'summary' => 'Aprende a usar Twig para crear vistas limpias y reutilizables.',
                'content' => "Twig es un motor de plantillas muy potente...\n¡Aprende a sacarle partido!",
                'publishedAt' => $now,
            ],
        ];

        foreach ($postsData as $data) {
            $post = new \App\Entity\Post();
            $post->setTitle($data['title'])
                ->setSlug($data['slug'])
                ->setSummary($data['summary'])
                ->setContent($data['content'])
                ->setPublishedAt($data['publishedAt']);
            $manager->persist($post);
        }

        $manager->flush();
    }
}
