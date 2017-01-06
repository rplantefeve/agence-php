<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Form\Type\AdresseType;
use RocketfireAgenceMainBundle\Entity\Adresse;
use Symfony\Component\HttpFoundation\Request;

class AdresseController extends Controller {

    /**
     * @Method({"GET","POST"})
     * @Route("/Adresse/add", host="agence.local", name="adresse_add")
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
            $this->addFlash('notice', 'Nouvelle adresse ajoutée.');
            // redirection pour le fun
            return $this->redirectToRoute('adresse_list');
        }

        return $this->render('RocketfireAgenceMainBundle:Adresse:create_adresse.html.twig', array('form' => $form->createView()));
    }

    /**
     * Finds and displays a adresse entity.
     * 
     * @Route("/Adresse/show/{idAdd}")
     * 
     * @Method({"GET","POST"})
     * @Route("/Adresse/show/{idAdd}", host="agence.local", name="adresse_show")
     * 
     */
    public function showAdresseAction(Adresse $adresse) {

        $deleteForm = $this->createDeleteForm($adresse);

        return $this->render('RocketfireAgenceMainBundle:Adresse:show_adresse.html.twig', array(
                    'adresse' => $adresse,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Lists all adresses
     * 
     * @Route("/Adresse/list", host="agence.local", name="adresse_list" )
     * @Method("GET")
     */
    public function listAdresseAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository('RocketfireAgenceMainBundle:Adresse')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Adresse:list_adresse.html.twig', array(
            'adresses' => $adresses,
        ));
    }
      
    /**
     * Displays a form to edit an existing adresse entity.
     * 
     * @Method({"GET","POST"})
     * @Route("/Adresse/edit/{idAdd}", host="agence.local", name="adresse_edit")
     */
    public function editAdresseAction(Request $request, Adresse $adresse) {
        $deleteForm = $this->createDeleteForm($adresse);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AdresseType', $adresse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            // store a message for the very next request
            $this->addFlash('notice', 'Mise à jour effectuée.');


            return $this->redirectToRoute('adresse_edit', array('idAdd' => $adresse->getidAdd()));
        }
        
        return $this->render('RocketfireAgenceMainBundle:Adresse:edit_adresse.html.twig', array(
            'adresse' => $adresse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
        
    }
            
    /**
     * Supprimer une adresse
     * 
     * @Route("/Adresse/delete/{idAdd}", host="agence.local", name="adresse_delete")
     * @Method("DELETE")
     * 
     */
    public function deleteAdresseAction(Request $request, Adresse $adresse) {
    
        $form = $this->createDeleteForm($adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adresse);
            $em->flush($adresse);
        }
        
        // store a message for the very next request
        $this->addFlash('notice', 'Suppression effectuée.');

        return $this->redirectToRoute('adresse_list');
    }
        
    
    private function createDeleteForm(Adresse $adresse) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('adresse_delete', array('idAdd' => $adresse->getidAdd())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
