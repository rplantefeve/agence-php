<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Entity\Client;
use RocketfireAgenceMainBundle\Entity\ClientParticulier;
use RocketfireAgenceMainBundle\Form\ClientType;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller {


    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/user/create", name="user_create")
     */
    public function createClientAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $clientParticulier = new ClientParticulier();
        $form   = $this->createForm(ClientType::class, $clientParticulier);

        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder le client
             */
            /*
             * This line fetches Doctrine's entity manager object, which is responsible
             * for the process of persisting objects to, and fetching objects from,
             * the database
             */
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($clientParticulier);
            /*
             * When the flush() method is called, Doctrine looks through all of the objects
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
            return $this->redirectToRoute('default');
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Default:client.create.html.twig',
                        array(
                    'form' => $form->createView())
        );
    }
}
