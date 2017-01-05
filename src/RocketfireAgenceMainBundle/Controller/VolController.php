<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class VolController extends Controller
{
    /**
     * @Route("/vol")
     */
     public function indexAction(){
         return $this->render('RocketfireAgenceMainBundle:Vol:index.html.twig');
     }
}
