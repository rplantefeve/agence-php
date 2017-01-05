<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Form\AdresseType;
use RocketfireAgenceMainBundle\Entity\Adresse;
use Symfony\Component\HttpFoundation\Request;

class AdresseController extends Controller {
    /**
     * @Method({"GET","POST"})
     * @Route("/Adresse/add", host="agence.local", name="cinema_add")
     */
    public function createAdresseAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder l'adresse
             */
            /*
             * This line fetches Doctrine's entity manager object, which is responsible
             * for the process of persisting objects to, and fetching objects from,
             * the database
             */
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($adresse);
            /*
             * When the flush() method is called, Doctrine looks through all of the
             * objects
             * that it's managing to see if they need to be persisted to the database.
             * In this example, the $product object's data doesn't exist in the database,
             * so the entity manager executes an INSERT query, creating a new row in the
             * product table.
             * Actually executes the queries (i.e. the INSERT query)
             */
            $em->flush();
            // store a message for the very next request
            $this->addFlash('notice', 'Félicitations, insertion réussie.');
            // redirection pour le fun
            return $this->redirectToRoute('home');
        }
        /*
          return $this->render( 'FormationCinemaCrudMainBundle:Default:cinema.add.html.twig',
          array( 'form' => $form->createView()) );
          } */



        return $this->render('RocketfireAgenceMainBundle:Adresse:create_adresse.html.twig', array('form' => $form->createView()));
    }

}
