<?php

namespace RocketfireAgenceMainBundle\Controller;

use RocketfireAgenceMainBundle\Entity\Login;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use RocketfireAgenceMainBundle\Form\Type\LoginType;

/**
 * Login controller.
 *
 * @Route("Login")
 */
class LoginController extends Controller {

    /**
     * Lists all login entities.
     *
     * @Route("/list", name="login_list")
     * @Method("GET")
     */
    public function listLoginAction() {
        $em = $this->getDoctrine()->getManager();

        $logins = $em->getRepository('RocketfireAgenceMainBundle:Login')->findAll();

        return $this->render('RocketfireAgenceMainBundle:Login:index.html.twig',
                        array(
                    'logins' => $logins,
        ));
    }

    /**
     * Creates a new login entity.
     *
     * @Route("/add", name="login_add")
     * @Method({"GET", "POST"})
     */
    public function addLoginAction(Request $request) {
        $login = new Login();
        $form  = $this->createForm(LoginType::class, $login);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $encoder  = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($login, $login->getMotDePasse());
            $login->setMotDePasse($password);

            $em->persist($login);
            $em->flush($login);

            return $this->redirectToRoute('login_show',
                            array(
                        'id' => $login->getId()));
        }

        return $this->render('RocketfireAgenceMainBundle:Login:new.html.twig',
                        array(
                    'login' => $login,
                    'form'  => $form->createView(),
        ));
    }

    /**
     * Finds and displays a login entity.
     *
     * @Route("/show/{id}", name="login_show")
     * @Method("GET")
     */
    public function showLoginAction(Login $login) {
        $deleteForm = $this->createDeleteForm($login);

        return $this->render('RocketfireAgenceMainBundle:Login:show.html.twig',
                        array(
                    'login'       => $login,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing login entity.
     *
     * @Route("/edit/{id}", name="login_edit")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editLoginAction(Request $request, Login $login) {
        $deleteForm = $this->createDeleteForm($login);
        $editForm   = $this->createForm(LoginType::class, $login);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $encoder  = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($login, $login->getMotDePasse());
            $login->setMotDePasse($password);

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice', 'Félicitations, modification réussie.');
            return $this->redirectToRoute('login_edit',
                            array(
                        'id' => $login->getId()));
        }

        return $this->render('RocketfireAgenceMainBundle:Login:edit.html.twig',
                        array(
                    'login'       => $login,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a login entity.
     *
     * @Route("/delete/{id}", name="login_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteLoginAction(Request $request, Login $login) {
        $form = $this->createDeleteForm($login);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($login);
            $em->flush($login);
        }

        return $this->redirectToRoute('login_list');
    }

    /**
     * Creates a form to delete a login entity.
     *
     * @param Login $login The login entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Login $login) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('login_delete',
                                        array(
                                    'id' => $login->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
