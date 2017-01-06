<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/default" ,name="default"))
     */
    public function indexAction()
    {
        return $this->render('RocketfireAgenceMainBundle:Default:index.html.twig');
    }
}
