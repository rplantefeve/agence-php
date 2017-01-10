<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Escale;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Escale controller.
 *
 * @Route("Escale")
 */
class EscaleController extends Controller {

    /**
     * Lists all escale entities.
     *
     * @Route("/list", name="escale_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $escales = $em->getRepository('RocketfireAgenceMainBundle:Escale')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Escale:index.html.twig', [
                    'escales' => $escales,
        ]);
    }

    /**
     * Creates a new escale entity.
     *
     * @Route("/add", name="escale_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $escale = new Escale();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\EscaleType', $escale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($escale);
            $em->flush($escale);

            return $this->redirectToRoute('escale_show', array('id' => $escale->getIdEscale()));
        }

        return $this->render('RocketfireAgenceMainBundle:Escale:new.html.twig', [
                    'escale' => $escale,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a escale entity.
     *
     * @Route("/show/{id}", name="escale_show")
     * @Method("GET")
     */
    public function showAction(Escale $escale) {
        $deleteForm = $this->createDeleteForm($escale);

        return $this->render('RocketfireAgenceMainBundle:Escale:show.html.twig', [
                    'escale' => $escale,
                    'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing escale entity.
     *
     * @Route("/edit/{id}", name="escale_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Escale $escale) {
        $deleteForm = $this->createDeleteForm($escale);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\EscaleType', $escale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('escale_edit', array('id' => $escale->getIdEscale()));
        }

        return $this->render('RocketfireAgenceMainBundle:Escale:edit.html.twig', [
                    'escale' => $escale,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a escale entity.
     *
     * @Route("/delete/{id}", name="escale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Escale $escale) {
        $form = $this->createDeleteForm($escale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            try {
                $em->remove($escale);
                $em->flush($escale);
            } catch (\Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException $e) {
                // store a message for the very next request
                $this->addFlash('error', 'Delete unauthorized : ForeignKey Constraint Violation (child exist) !');
            }
        }

        return $this->redirectToRoute('escale_index');
    }

    /**
     * Creates a form to delete a escale entity.
     *
     * @param Escale $escale The escale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Escale $escale) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('escale_delete', array('id' => $escale->getIdEscale())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
