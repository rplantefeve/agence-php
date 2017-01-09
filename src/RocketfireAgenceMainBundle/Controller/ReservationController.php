<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reservation controller.
 *
 * @Route("Reservation")
 */
class ReservationController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     * @Route("/list", name="Reservation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('RocketfireAgenceMainBundle:Reservation')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Reservation:index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     * @Route("/add", name="Reservation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\Type\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush($reservation);

            return $this->redirectToRoute('Reservation_show', array('id' => $reservation->getIdResa()));
        }

        return $this->render('RocketfireAgenceMainBundle:Reservation:new.html.twig', array(
            'reservation' => $reservation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     * @Route("/show/{id}", name="Reservation_show")
     * @Method("GET")
     */
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('RocketfireAgenceMainBundle:Reservation:show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     * @Route("/edit/{id}", name="Reservation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\Type\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Reservation_edit', array('id' => $reservation->getIdResa()));
        }

        return $this->render('RocketfireAgenceMainBundle:Reservation:edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     * @Route("/delete/{id}", name="Reservation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush($reservation);
        }

        return $this->redirectToRoute('Reservation_index');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param Reservation $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Reservation_delete', array('id' => $reservation->getIdResa())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
