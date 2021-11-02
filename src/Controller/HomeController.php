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
    public function number($etat = 200, $ids = 0)
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


        
        if($etat == 500)
        {
            $number_1 = $ids;
        } 
        else
        {
            $max = count($images);
            $number_1 = random_int(0, $max -2);
        }
        

        
        
        $image_1 = $repository->findOneBy(['id' => $number_1]);
        

        $image_2 = $repository->findOneBy(['id' => $number_1+1]);

        $images_a_afficher = [$image_1, $image_2];

        return $this->render('Page1/index_Vote.html.twig', [
            'images' => $images_a_afficher,
            'ids' => $number_1
        ]);
    }
}