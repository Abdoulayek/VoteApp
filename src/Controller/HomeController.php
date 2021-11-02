<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\ImageData;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
   /**
    * @Route("/", name="Page1")
    */
    public function number()
    {
 
        $ImagesJson = file_get_contents('data.json');
        $images = json_decode($ImagesJson);
       
        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()->getRepository(ImageData::class);

        
        $image = $repository->findAll();
        
        if($image == null){
            
            foreach ($images as $value){
                $image = new ImageData();
                $image->setUrl($value->url);
                $image->setImageId($value->id);
                $image->setNbClick(0);
               
                $entityManager->persist($image);
            }
    
          
            $entityManager->flush();

        }
        

        return $this->render('Page1/index_Vote.html.twig', [
            'images' => $images
        ]);
    }
}