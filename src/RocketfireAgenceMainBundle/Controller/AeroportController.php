<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Aeroport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Aeroport controller.
 *
 * @Route("Aeroport")
 */
class AeroportController extends Controller
{
    /**
     * Lists all aeroport entities.
     *
     * @Route("/list", name="aeroport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aeroports = $em->getRepository('RocketfireAgenceMainBundle:Aeroport')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Aeroport:index.html.twig', [
            'aeroports' => $aeroports,
        ]);
    }

    /**
     * Creates a new aeroport entity.
     *
     * @Route("/add", name="aeroport_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $aeroport = new Aeroport();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AeroportType', $aeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aeroport);
            $em->flush($aeroport);

            return $this->redirectToRoute('aeroport_show', ['id' => $aeroport->getIdAero()]);
        }

        return $this->render('RocketfireAgenceMainBundle:Aeroport:new.html.twig', [
            'aeroport' => $aeroport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a aeroport entity.
     *
     * @Route("/show/{id}", name="aeroport_show")
     * @Method("GET")
     */
    public function showAction(Aeroport $aeroport)
    {
        $deleteForm = $this->createDeleteForm($aeroport);

        return $this->render('RocketfireAgenceMainBundle:Aeroport:show.html.twig', [
            'aeroport' => $aeroport,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing aeroport entity.
     *
     * @Route("/edit/{id}", name="aeroport_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Aeroport $aeroport)
    {
        $deleteForm = $this->createDeleteForm($aeroport);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\AeroportType', $aeroport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aeroport_edit', ['id' => $aeroport->getIdAero()]);
        }

        return $this->render('RocketfireAgenceMainBundle:Aeroport:edit.html.twig', [
            'aeroport' => $aeroport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a aeroport entity.
     *
     * @Route("/delete/{id}", name="aeroport_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Aeroport $aeroport)
    {
        $form = $this->createDeleteForm($aeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aeroport);
            $em->flush($aeroport);
        }

        return $this->redirectToRoute('aeroport_index');
    }

    /**
     * Creates a form to delete a aeroport entity.
     *
     * @param Aeroport $aeroport The aeroport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Aeroport $aeroport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aeroport_delete', ['id' => $aeroport->getIdAero()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
