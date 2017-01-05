<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Login;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Login controller.
 *
 * @Route("login")
 */
class LoginController extends Controller
{
    /**
     * Lists all login entities.
     *
     * @Route("/", name="login_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $logins = $em->getRepository('RocketfireAgenceMainBundle:Login')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Login:index.html.twig', array(
            'logins' => $logins,
        ));
    }

    /**
     * Creates a new login entity.
     *
     * @Route("/new", name="login_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $login = new Login();
        $form = $this->createForm('RocketfireAgenceMainBundle\Form\LoginType', $login);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($login);
            $em->flush($login);

            return $this->redirectToRoute('login_show', array('id' => $login->getId()));
        }

        return $this->render('RocketfireAgenceMainBundle:Login:new.html.twig', array(
            'login' => $login,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a login entity.
     *
     * @Route("/{id}", name="login_show")
     * @Method("GET")
     */
    public function showAction(Login $login)
    {
        $deleteForm = $this->createDeleteForm($login);

        return $this->render('RocketfireAgenceMainBundle:Login:show.html.twig', array(
            'login' => $login,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing login entity.
     *
     * @Route("/{id}/edit", name="login_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Login $login)
    {
        $deleteForm = $this->createDeleteForm($login);
        $editForm = $this->createForm('RocketfireAgenceMainBundle\Form\LoginType', $login);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('login_edit', array('id' => $login->getId()));
        }

        return $this->render('RocketfireAgenceMainBundle:Login:edit.html.twig', array(
            'login' => $login,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a login entity.
     *
     * @Route("/{id}", name="login_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Login $login)
    {
        $form = $this->createDeleteForm($login);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($login);
            $em->flush($login);
        }

        return $this->redirectToRoute('login_index');
    }

    /**
     * Creates a form to delete a login entity.
     *
     * @param Login $login The login entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Login $login)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('login_delete', array('id' => $login->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
