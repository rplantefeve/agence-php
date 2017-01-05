<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AeroportController extends Controller
{
    /**
     * @Route("/aeroport")
     */
     public function indexAction(){
         return $this->render('RocketfireAgenceMainBundle:Aeroport:index.html.twig');
     }
}
