<?php
// src/Controller/GalerieController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Resquest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Image;
use Doctrine\Persistence\ManagerRegistry;


class GalerieController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
    public function index2(Resquest $request, $nom): Response
    {
        dd($request);
        return $this->render('hello2.html.twig',array('lenom'=>$nom));
    }
    public function img($page): Response
    {
        $images = array();
        for ($i=($page-1)*6+1;$i<=$page*6;$i++){
    		$images[] = "img$i.jpg";	
    	}
        for ($i=($page-1)*6+1;$i<=$page*6;$i++){
    		$images[] = "img$i.png";	
    	}
        return $this->render('img.html.twig', array('image'=>$images, 'page'=>$page));


    }

    public function add(ManagerRegistry $doctrine): Response
    {
        $image = new Image();
    	$image->setTitle("lion.jpg");
        $image->setAutor("Morgan"); 
    	$image->setDate(new \DateTime("today"));
    	$em = $doctrine->getManager(); //Récupérer le manager
	    $em->persist($image); //Dire à Doctrine de gérer $e1
		$em->flush();
        return  $this->render('ajout.html.twig', array('image'=>$image));
    }
    
 
}
