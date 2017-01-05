<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EscaleController extends Controller
{
    /**
     * @Route("/escale")
     */
     public function indexAction(){
         return $this->render('RocketfireAgenceMainBundle:Escale:index.html.twig');
     }
}
