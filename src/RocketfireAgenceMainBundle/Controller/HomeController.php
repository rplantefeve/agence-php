<?php


namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     */
    public function homeAction (Request $request) {
        return $this->render('RocketfireAgenceMainBundle:Home:home.html.twig');
    }
}
