<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ville controller.
 *
 * @Route("Ville")
 */
class VilleController extends Controller
{
    /**
     * Lists all ville entities.
     *
     * @Route("/list", name="ville_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $villes = $em->getRepository('RocketfireAgenceMainBundle:Ville')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Ville:index.html.twig', [
            'villes' => $villes,
        ]);
    }

    /**
     * Creates a new ville entity.
     *
     * @Route("/add", name="ville_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ville = new Ville();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\VilleType', $ville);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ville);
            $em->flush($ville);

            return $this->redirectToRoute('ville_show', ['id' => $ville->getId()]);
        }

        return $this->render('RocketfireAgenceMainBundle:Ville:new.html.twig', [
            'ville' => $ville,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a ville entity.
     *
     * @Route("/show/{id}", name="ville_show")
     * @Method("GET")
     */
    public function showAction(Ville $ville)
    {
        $deleteForm = $this->createDeleteForm($ville);

        return $this->render('RocketfireAgenceMainBundle:Ville:show.html.twig', [
            'ville' => $ville,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing ville entity.
     *
     * @Route("/edit/{id}", name="ville_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ville $ville)
    {
        $deleteForm = $this->createDeleteForm($ville);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\VilleType', $ville);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ville_edit', ['id' => $ville->getId()]);
        }

        return $this->render('RocketfireAgenceMainBundle:Ville:edit.html.twig', [
            'ville' => $ville,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a ville entity.
     *
     * @Route("/delete/{id}", name="ville_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ville $ville)
    {
        $form = $this->createDeleteForm($ville);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ville);
            $em->flush($ville);
        }

        return $this->redirectToRoute('ville_index');
    }

    /**
     * Creates a form to delete a ville entity.
     *
     * @param Ville $ville The ville entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ville $ville)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ville_delete', ['id' => $ville->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
