<?php


namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of HomeController
 *
 * @author admin
 */
class HomeController extends Controller {

    /**
     * @param Request $request
     *
     * @return type
     * @Route("/home", name="home")
     * @Method("GET")
     */
    public function homeAction (Request $request) {
        return $this->render('RocketfireAgenceMainBundle:Home:home.html.twig');
    }
}
