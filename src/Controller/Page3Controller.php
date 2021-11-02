<?php
// src/Controller/Page3Controller.php
namespace App\Controller;

use App\Entity\ImageData;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Page3Controller extends AbstractController
{
    
   /**
    * @Route("/Page3Controller/{id}/{ids}/{num}", name="Page3")
    */
    public function number($id, $ids, $num)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(ImageData::class);
        
        $image = $repository->findOneBy(['imageId' => $id]);
        
        $nb = $image->getNbClick();
        $image->setNbClick($nb+1);
        
        
        $entityManager->persist($image);
        $entityManager->flush();

        //dump($id);die;
        $image_1 = $repository->findOneBy(['id' => $num]);
        

        $image_2 = $repository->findOneBy(['id' => $num+1]);

        $images_a_afficher = [$image_1, $image_2];
        

        return $this->render('Page1/index_Vote.html.twig', [
            'ids' => $ids,
            'etat' => 500,
            'images' => $images_a_afficher
        ]);
        
    }

}