<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Adresse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
<<<<<<< debug
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
=======
use RocketfireAgenceMainBundle\Form\Type\AdresseType;
use RocketfireAgenceMainBundle\Entity\Adresse;
>>>>>>> Entité Adresse complète
use Symfony\Component\HttpFoundation\Request;

/**
 * Adresse controller.
 *
 * @Route("Adresse")
 */
class AdresseController extends Controller
{
    /**
     * Lists all adresse entities.
     *
     * @Route("/list", name="Adresse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository('RocketfireAgenceMainBundle:Adresse')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Adresse:index.html.twig', array(
            'adresses' => $adresses,
        ));
    }

    /**
<<<<<<< debug
     * Creates a new adresse entity.
     *
     * @Route("/add", name="Adresse_new")
     * @Method({"GET", "POST"})
=======
     * @Method({"GET","POST"})
     * @Route("/Adresse/add", host="agence.local", name="adresse_add")
>>>>>>> Entité Adresse complète
     */
    public function newAction(Request $request)
    {
        $adresse = new Adresse();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AdresseType', $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
<<<<<<< debug
            $em->flush($adresse);

            return $this->redirectToRoute('Adresse_show', array('id' => $adresse->getIdAdd()));
=======
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
>>>>>>> Entité Adresse complète
        }

        return $this->render('RocketfireAgenceMainBundle:Adresse:new.html.twig', array(
            'adresse' => $adresse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a adresse entity.
<<<<<<< debug
     *
     * @Route("/show/{id}", name="Adresse_show")
     * @Method("GET")
     */
    public function showAction(Adresse $adresse)
    {
        $deleteForm = $this->createDeleteForm($adresse);

        return $this->render('RocketfireAgenceMainBundle:Adresse:show.html.twig', array(
            'adresse' => $adresse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing adresse entity.
     *
     * @Route("/edit/{id}", name="Adresse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Adresse $adresse)
    {
        $deleteForm = $this->createDeleteForm($adresse);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AdresseType', $adresse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Adresse_edit', array('id' => $adresse->getIdAdd()));
        }

        return $this->render('RocketfireAgenceMainBundle:Adresse:edit.html.twig', array(
            'adresse' => $adresse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
=======
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
>>>>>>> Entité Adresse complète
        ));
    }
      
    /**
<<<<<<< debug
     * Deletes a adresse entity.
     *
     * @Route("/delete/{id}", name="Adresse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Adresse $adresse)
    {
        $form = $this->createDeleteForm($adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adresse);
            $em->flush($adresse);
        }

        return $this->redirectToRoute('Adresse_index');
=======
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
        
>>>>>>> Entité Adresse complète
    }
            
    /**
<<<<<<< debug
     * Creates a form to delete a adresse entity.
     *
     * @param Adresse $adresse The adresse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Adresse $adresse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Adresse_delete', array('id' => $adresse->getIdAdd())))
            ->setMethod('DELETE')
            ->getForm()
=======
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
>>>>>>> Entité Adresse complète
        ;
    }
}
