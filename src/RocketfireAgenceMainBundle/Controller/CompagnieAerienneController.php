<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Form\CompagnieAerienneType;
use RocketfireAgenceMainBundle\Entity\CompagnieAerienne;
use Symfony\Component\HttpFoundation\Request;

class CompagnieAerienneController extends Controller {

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienne/add", host="agence.local", name="CompagnieAerienne_add")
     */
    public function createCompagnieAerienneAction(Request $request) {
        /*
         * 1) Construire le formulaire
         */
        $compagnieAerienne = new CompagnieAerienne();
        $form = $this->createForm(CompagnieAerienneType::class, $compagnieAerienne);
        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder compagnie Aerienne
             */
            /*
             * This line fetches Doctrine's entity manager object, which is responsible
             * for the process of persisting objects to, and fetching objects from,
             * the database
             */
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($compagnieAerienne);
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
            return $this->redirectToRoute('CompagnieAerienne_list');
        }
        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienne:create_compagnie_aerienne.html.twig',
                        array(
                        'form' => $form->createView()
        ));
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienne/edit/{id}", host="agence.local", name="CompagnieAerienne_edit")
     * @param Request $request
     * @param integer $id
     * @return type
     * @throws type
     */
    public function editCompagnieAerienneAction(Request $request, $id) {
        
        $em = $this->getDoctrine()->getManager();
        $compagnieAerienne = $em->getRepository('RocketfireAgenceMainBundle:CompagnieAerienne')->find($id);
        
        if (!$compagnieAerienne) {
            throw $this->createNotFoundException(
                    'Pas de compagnie pour id ' . $id
            );
        }
        /*
         * 1) Construire le formulaire
         */
        $form = $this->createForm(CompagnieAerienneType::class, $compagnieAerienne);
        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder la compagnie aerienne
             */
            $em->flush();
            // store a message for the very next request
            $this->addFlash('notice', 'Mise à jour réussie.');
            // redirection
            return $this->redirectToRoute('CompagnieAerienne_list');
        }
        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienne:edit_compagnie_aerienne.html.twig',
                        array(
                      'form' => $form->createView()
        ));
    }

    /**
     * @Method({"GET","POST"})
     * @param integer $id
     * @Route("/CompagnieAerienne/delete/{id}", host="agence.local", name="CompagnieAerienne_delete")
     * @return type
     * @throws type
     */
    public function deleteCompagnieAerienneAction($id) {
       
        $em = $this->getDoctrine()->getManager();
        $compagnieAerienne = $em->getRepository('RocketfireAgenceMainBundle:CompagnieAerienne')->find($id);
        if (!$compagnieAerienne) {
            throw $this->createNotFoundException(
                    'Pas de compagnie pour identifiant ' . $id
            );
        } 
        $em->remove($compagnieAerienne);
        $em->flush();
        
        // store a message for the very next request
        $this->addFlash('notice', 'Suppression réussie.');
        
      
        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienne:delete_compagnie_aerienne.html.twig',
                       ['compagnieAerienne' => $compagnieAerienne]);
       
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienne/show/{id}", host="agence.local", name="CompagnieAerienne_show")
     * @param integer $id
     */
    public function showCompagnieAerienneAction($id) {
        // on récupère le repository
        // PHP class whose only job is to help you fetch entities of a certain class
        $compagnieAerienne = $this->getDoctrine()
                ->getRepository('RocketfireAgenceMainBundle:CompagnieAerienne')
                ->find($id);
        if (!$compagnieAerienne) {
            throw $this->createNotFoundException(
                    'Pas de compagnie pour id ' . $id
            );
        }

        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienne:show_compagnie_aerienne.html.twig',
                        ['compagnieAerienne' => $compagnieAerienne]);
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienne/list", host="agence.local", name="CompagnieAerienne_list")
     */
    public function listCompagnieAerienneAction() {
        // on récupère le repository 
        // PHP class whose only job is to help you fetch entities of a certain class
        $compagnieAeriennes = $this->getDoctrine()
                ->getRepository('RocketfireAgenceMainBundle:CompagnieAerienne')
                ->findAll();
        if (!$compagnieAeriennes) {
            throw $this->createNotFoundException(
                    'Pas de compagnie !'
            );                   
    }
return $this->render('RocketfireAgenceMainBundle:CompagnieAerienne:list_compagnie_aerienne.html.twig',
                       ['compagnieAeriennes' => $compagnieAeriennes]);
}
}