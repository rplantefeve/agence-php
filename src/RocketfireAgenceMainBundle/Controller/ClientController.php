<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Entity\ClientParticulier;
use RocketfireAgenceMainBundle\Entity\ClientAssociation;
use RocketfireAgenceMainBundle\Form\Type\ClientAssociationType;
use RocketfireAgenceMainBundle\Form\Type\ClientParticulierType;
use Symfony\Component\HttpFoundation\Request;
use RocketfireAgenceMainBundle\Entity\ClientEntreprise;
use RocketfireAgenceMainBundle\Form\Type\ClientEntrepriseType;
use RocketfireAgenceMainBundle\Entity\Adresse;

class ClientController extends Controller {

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/inscrire/client", name="inscrire_client")
     */
    public function clientHomeAction(Request $request) {
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.html.twig');
    }

    /**
     * @Route("/Client/test", name="client_adresse")
     */
    public function linkClientAdresseAction(Request $request) {
        $clientParticulier = new ClientParticulier();
        $adresse = new Adresse();

        $formData['client'] = $clientParticulier;
        $formData['adresse'] = $adresse;

        $formClientAdresse = $this->createForm(\RocketfireAgenceMainBundle\Form\Type\ClientAdresseType::class, $formData);

        $formClientAdresse->handleRequest($request);
        if ($formClientAdresse->isSubmitted() && $formClientAdresse->isValid()) {
            /*
             * 3) Sauvegarder le client
             */
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $clientParticulier->setAdresse($adresse);
            $em->persist($adresse);
            $em->persist($clientParticulier);
            $em->flush();
            // store a message for the very next request
            $this->addFlash('notice', 'Félicitations, insertion réussie.');
            // redirection pour le fun
            return $this->redirectToRoute('inscrire_client');
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.particulier.html.twig', array(
                    'form' => $formClientAdresse->createView())
        );
    }

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/Client/Particulier/add", name="client_particulier_add")
     */
    public function createClientParticulierAction(Request $request) {

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush($adresse);

            return $this->redirectToRoute('Adresse_show', array('id' => $adresse->getIdAdd()));
        }

        return $this->render('RocketfireAgenceMainBundle:Adresse:new.html.twig', array(
                    'adresse' => $adresse,
                    'form' => $form->createView(),
        ));
        /*
         * 1) Construire le formulaire
         */
        $clientParticulier = new ClientParticulier();
        $adresse = new Adresse();
        $formClient = $this->createForm(ClientParticulierType::class, $clientParticulier);
        $formAdresse = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AdresseType', $adresse);

        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder le client
             */
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($clientParticulier);
            $em->flush();
            // store a message for the very next request
            $this->addFlash('notice', 'Félicitations, insertion réussie.');
            // redirection pour le fun
            return $this->redirectToRoute('inscrire_client');
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.particulier.html.twig', array(
                    'form' => $form->createView())
        );
    }

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/Client/Association/add", name="client_association_add")
     */
    public function createClientAssociationAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $clientAssociation = new ClientAssociation();
        $form = $this->createForm(ClientAssociationType::class, $clientAssociation);

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
            return $this->redirectToRoute('inscrire_client');
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.association.html.twig', array(
                    'form' => $form->createView())
        );
    }

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/Client/Entreprise/add", name="client_entreprise_add")
     */
    public function createClientEntrepriseAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $clientEntreprise = new ClientEntreprise();
        $form = $this->createForm(ClientEntrepriseType::class, $clientEntreprise);

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
            return $this->redirectToRoute('inscrire_client');
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.entreprise.html.twig', array(
                    'form' => $form->createView())
        );
    }

}
