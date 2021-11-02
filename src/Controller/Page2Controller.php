<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\ImageData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Page2Controller extends AbstractController
{
   /**
    * @Route("/Page2Controller/{id}", name="Page2")
    */
    public function number($id)
    {
        $image_1_id = $id;
        $image_2_id = $image_1_id + 1;

        $image_1 = $this->getDoctrine()
            ->getRepository(ImageData::class)
            ->find($image_1_id);

        $image_2 = $this->getDoctrine()
            ->getRepository(ImageData::class)
            ->find($image_2_id);

        
        $images = [$image_1, $image_2];

        return $this->render('Page2/index_Resultats.html.twig', [
            'images' => $images,
        ]);
    }
}