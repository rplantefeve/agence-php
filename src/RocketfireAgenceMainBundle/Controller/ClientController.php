<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Entity\Client;
use RocketfireAgenceMainBundle\Entity\ClientParticulier;
use RocketfireAgenceMainBundle\Entity\ClientAssociation;
use RocketfireAgenceMainBundle\Form\Type\ClientAssociationType;
use RocketfireAgenceMainBundle\Form\Type\ClientType;
use RocketfireAgenceMainBundle\Form\Type\ClientParticulierType;
use Symfony\Component\HttpFoundation\Request;
use RocketfireAgenceMainBundle\Entity\ClientEntreprise;
use RocketfireAgenceMainBundle\Form\Type\ClientEntrepriseType;

class ClientController extends Controller {


    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/client/home", name="client_home")
     */
    public function clientHome(Request $request){
         return $this->render(
                        'RocketfireAgenceMainBundle:Default:client.home.html.twig');
    }
    
    
    
    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/create/client/particulier", name="create_client_particulier")
     */
    public function createClientParticulierAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $clientParticulier = new ClientParticulier();
        $form   = $this->createForm(ClientParticulierType::class, $clientParticulier);

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
                        'RocketfireAgenceMainBundle:Default:client.create.particulier.html.twig',
                        array(
                    'form' => $form->createView())
        );
    }
    
     /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/create/client/association", name="create_client_association")
     */
    public function createClientAssociationAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $clientAssociation = new ClientAssociation();
        $form   = $this->createForm(ClientAssociationType::class, $clientAssociation);

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
            $em->persist($clientAssociation);
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
                        'RocketfireAgenceMainBundle:Default:client.create.association.html.twig',
                        array(
                    'form' => $form->createView())
        );
    }
    
    
    
    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/create/client/entreprise", name="create_client_entreprise")
     */
    public function createClientEntrepriseAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $clientEntreprise = new ClientEntreprise();
        $form   = $this->createForm(ClientEntrepriseType::class, $clientEntreprise);

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
            $em->persist($clientEntreprise);
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
                        'RocketfireAgenceMainBundle:Default:client.create.entreprise.html.twig',
                        array(
                    'form' => $form->createView())
        );
    }
    
    
}
