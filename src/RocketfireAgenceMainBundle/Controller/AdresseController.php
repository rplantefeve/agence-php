<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Adresse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * @Route("/list", name="adresse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository('RocketfireAgenceMainBundle:Adresse')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Adresse:index.html.twig', [
            'adresses' => $adresses,
        ]);
    }

    /**
     * Creates a new adresse entity.
     *
     * @Route("/add", name="adresse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $adresse = new Adresse();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AdresseType', $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush($adresse);

            return $this->redirectToRoute('adresse_show', ['id' => $adresse->getIdAdd()]);
        }

        return $this->render('RocketfireAgenceMainBundle:Adresse:new.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a adresse entity.
     *
     * @Route("/show/{id}", name="adresse_show")
     * @Method("GET")
     */
    public function showAction(Adresse $adresse)
    {
        $deleteForm = $this->createDeleteForm($adresse);

        return $this->render('RocketfireAgenceMainBundle:Adresse:show.html.twig', [
            'adresse' => $adresse,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing adresse entity.
     *
     * @Route("/edit/{id}", name="adresse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Adresse $adresse)
    {
        $deleteForm = $this->createDeleteForm($adresse);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AdresseType', $adresse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adresse_edit', ['id' => $adresse->getIdAdd()]);
        }

        return $this->render('RocketfireAgenceMainBundle:Adresse:edit.html.twig', [
            'adresse' => $adresse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a adresse entity.
     *
     * @Route("/delete/{id}", name="adresse_delete")
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

        return $this->redirectToRoute('adresse_index');
    }

    /**
     * Creates a form to delete a adresse entity.
     *
     * @param Adresse $adresse The adresse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Adresse $adresse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresse_delete', ['id' => $adresse->getIdAdd()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
