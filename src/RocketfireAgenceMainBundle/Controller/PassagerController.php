<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Passager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Passager controller.
 *
 * @Route("Passager")
 */
class PassagerController extends Controller
{
    /**
     * Lists all passager entities.
     *
     * @Route("/list", name="passager_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passagers = $em->getRepository('RocketfireAgenceMainBundle:Passager')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Passager:index.html.twig', array(
            'passagers' => $passagers,
        ));
    }

    /**
     * Creates a new passager entity.
     *
     * @Route("/add", name="passager_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $passager = new Passager();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\PassagerType', $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passager);
            $em->flush($passager);

            return $this->redirectToRoute('passager_show', array('id' => $passager->getId()));
        }

        return $this->render('RocketfireAgenceMainBundle:Passager:new.html.twig', array(
            'passager' => $passager,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passager entity.
     *
     * @Route("/show/{id}", name="passager_show")
     * @Method("GET")
     */
    public function showAction(Passager $passager)
    {
        $deleteForm = $this->createDeleteForm($passager);

        return $this->render('RocketfireAgenceMainBundle:Passager:show.html.twig', array(
            'passager' => $passager,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passager entity.
     *
     * @Route("/edit/{id}", name="passager_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Passager $passager)
    {
        $deleteForm = $this->createDeleteForm($passager);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\PassagerType', $passager);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passager_edit', array('id' => $passager->getId()));
        }

        return $this->render('RocketfireAgenceMainBundle:Passager:edit.html.twig', array(
            'passager' => $passager,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passager entity.
     *
     * @Route("/delete/{id}", name="passager_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Passager $passager)
    {
        $form = $this->createDeleteForm($passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passager);
            $em->flush($passager);
        }

        return $this->redirectToRoute('passager_index');
    }

    /**
     * Creates a form to delete a passager entity.
     *
     * @param Passager $passager The passager entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Passager $passager)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('passager_delete', array('id' => $passager->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
