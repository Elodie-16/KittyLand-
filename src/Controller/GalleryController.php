<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// ON CHANGE "Annotation" PAR "Attribute" ICI :
use Symfony\Component\Routing\Attribute\Route; 

class GalleryController extends AbstractController
{
    #[Route('/gallery', name: 'app_gallery')]
    public function index(): Response
    {
        $images = [
            [
                'filename' => 'https://picsum.photos/400/300?random=1', 
                'title' => 'Image 1', 
                'description' => 'Ma première photo'
            ],
            [
                'filename' => 'https://picsum.photos/400/300?random=2', 
                'title' => 'Image 2', 
                'description' => 'Ma deuxième photo'
            ],
            [
                'filename' => 'https://picsum.photos/400/300?random=3', 
                'title' => 'Image 3', 
                'description' => 'Ma troisième photo'
            ],
        ];

        return $this->render('gallery/index.html.twig', [
            'images' => $images,
        ]);
    }
}