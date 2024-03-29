<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\VilleAeroport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Villeaeroport controller.
 *
 * @Route("Ville/Aeroport")
 */
class VilleAeroportController extends Controller
{
    /**
     * Lists all villeAeroport entities.
     *
     * @Route("/list", name="villeaeroport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $villeAeroports = $em->getRepository('RocketfireAgenceMainBundle:VilleAeroport')->findAll();

        return $this->render('RocketfireAgenceMainBundle:VilleAeroport:index.html.twig', [
            'villeAeroports' => $villeAeroports,
        ]);
    }

    /**
     * Creates a new villeAeroport entity.
     *
     * @Route("/add", name="villeaeroport_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $villeAeroport = new Villeaeroport();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\VilleAeroportType', $villeAeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($villeAeroport);
            $em->flush($villeAeroport);

            return $this->redirectToRoute('villeaeroport_show', ['id' => $villeAeroport->getId()]);
        }

        return $this->render('RocketfireAgenceMainBundle:VilleAeroport:new.html.twig', [
            'villeAeroport' => $villeAeroport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a villeAeroport entity.
     *
     * @Route("/show/{id}", name="villeaeroport_show")
     * @Method("GET")
     */
    public function showAction(VilleAeroport $villeAeroport)
    {
        $deleteForm = $this->createDeleteForm($villeAeroport);

        return $this->render('RocketfireAgenceMainBundle:VilleAeroport:show.html.twig', [
            'villeAeroport' => $villeAeroport,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing villeAeroport entity.
     *
     * @Route("/edit/{id}", name="villeaeroport_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VilleAeroport $villeAeroport)
    {
        $deleteForm = $this->createDeleteForm($villeAeroport);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\VilleAeroportType', $villeAeroport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('villeaeroport_edit', ['id' => $villeAeroport->getId()]);
        }

        return $this->render('RocketfireAgenceMainBundle:VilleAeroport:edit.html.twig', [
            'villeAeroport' => $villeAeroport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a villeAeroport entity.
     *
     * @Route("/delete/{id}", name="villeaeroport_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VilleAeroport $villeAeroport)
    {
        $form = $this->createDeleteForm($villeAeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($villeAeroport);
            $em->flush($villeAeroport);
        }

        return $this->redirectToRoute('villeaeroport_index');
    }

    /**
     * Creates a form to delete a villeAeroport entity.
     *
     * @param VilleAeroport $villeAeroport The villeAeroport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VilleAeroport $villeAeroport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('villeaeroport_delete', ['id' => $villeAeroport->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
