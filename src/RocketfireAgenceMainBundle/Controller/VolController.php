<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Vol;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vol controller.
 *
 * @Route("Vol")
 */
class VolController extends Controller
{
    /**
     * Lists all vol entities.
     *
     * @Route("/list", name="vol_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vols = $em->getRepository('RocketfireAgenceMainBundle:Vol')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Vol:index.html.twig', array(
            'vols' => $vols,
        ));
    }

    /**
     * Creates a new vol entity.
     *
     * @Route("/add", name="vol_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vol = new Vol();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\VolType', $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vol);
            $em->flush($vol);

            return $this->redirectToRoute('vol_show', array('id' => $vol->getIdVol()));
        }

        return $this->render('RocketfireAgenceMainBundle:Vol:new.html.twig', array(
            'vol' => $vol,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vol entity.
     *
     * @Route("/show/{id}", name="vol_show")
     * @Method("GET")
     */
    public function showAction(Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);

        return $this->render('RocketfireAgenceMainBundle:Vol:show.html.twig', array(
            'vol' => $vol,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vol entity.
     *
     * @Route("/edit/{id}", name="vol_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\VolType', $vol);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vol_edit', array('id' => $vol->getIdVol()));
        }

        return $this->render('RocketfireAgenceMainBundle:Vol:edit.html.twig', array(
            'vol' => $vol,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vol entity.
     *
     * @Route("/delete/{id}", name="vol_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vol $vol)
    {
        $form = $this->createDeleteForm($vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vol);
            $em->flush($vol);
        }

        return $this->redirectToRoute('vol_index');
    }

    /**
     * Creates a form to delete a vol entity.
     *
     * @param Vol $vol The vol entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vol $vol)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vol_delete', array('id' => $vol->getIdVol())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
