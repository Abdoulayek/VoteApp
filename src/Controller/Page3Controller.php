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
    * @Route("/Page3Controller/number/{id}", name="Page3")
    */
    public function number($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(ImageData::class);
        
        $image = $repository->findOneBy(['imageId' => $id]);
        
        $nb = $image->getNbClick();
        $image->setNbClick($nb+1);
        
        
        $entityManager->persist($image);
        $entityManager->flush();

        return $this->redirect($_SERVER['HTTP_REFERER']);
        
    }

}