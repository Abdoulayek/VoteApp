<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\ImageData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Page2Controller extends AbstractController
{
   /**
    * @Route("/Page2Controller", name="Page2")
    */
    public function number()
    {
        $repository = $this->getDoctrine()->getRepository(ImageData::class);
        $images = $repository->findAll();

        return $this->render('Page2/index_Resultats.html.twig', [
            'images' => $images,
        ]);
    }
}