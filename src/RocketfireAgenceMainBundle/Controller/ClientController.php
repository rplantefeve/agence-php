<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Entity\ClientParticulier;
use RocketfireAgenceMainBundle\Entity\ClientAssociation;
use RocketfireAgenceMainBundle\Form\Type\ClientParticulierAdresseLoginType;
use RocketfireAgenceMainBundle\Form\Type\ClientEntrepriseAdresseLoginType;
use RocketfireAgenceMainBundle\Form\Type\ClientAssociationAdresseLoginType;
use Symfony\Component\HttpFoundation\Request;
use RocketfireAgenceMainBundle\Entity\ClientEntreprise;
use RocketfireAgenceMainBundle\Entity\Adresse;
use RocketfireAgenceMainBundle\Entity\Login;

class ClientController extends Controller {

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/inscrire/client", name="inscrire_client")
     */
    public function clientHomeAction(Request $request) {
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.html.twig');
    }

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/Client/Particulier/add", name="client_particulier_add")
     */
    public function linkClientParticulierAdresseAction(Request $request) {
        $clientParticulier = new ClientParticulier();
        $adresse = new Adresse();
        $login = new Login();

        $formData['client'] = $clientParticulier;
        $formData['adresse'] = $adresse;
        $formData['login'] = $login;

        $formClientAdresse = $this->createForm(ClientParticulierAdresseLoginType::class, $formData);

        $formClientAdresse->handleRequest($request);
        if ($formClientAdresse->isSubmitted() && $formClientAdresse->isValid()) {
            if ($login->getMotDePasse() == $login->getMotDePasseConf()) {
                $encoder = $this->get('security.password_encoder');
                $password = $encoder->encodePassword($login, $login->getMotDePasse());
                $login->setMotDePasse($password);
                /*
                 * 3) Sauvegarder le client
                 */
                $em = $this->getDoctrine()->getManager();
                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $clientParticulier->setAdresse($adresse);
                $clientParticulier->setLogin($login);
                $em->persist($adresse);
                $em->persist($login);
                $em->persist($clientParticulier);
                $em->flush();
                // store a message for the very next request
                $this->addFlash('notice', 'Félicitations, insertion réussie.');
                // redirection pour le fun
                return $this->redirectToRoute('inscrire_client');
            } else {
                $this->addFlash('errorPassword', "Le mot de passe ne correspond pas à la confirmation.");
            }
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.particulier.html.twig', array(
                    'form' => $formClientAdresse->createView())
        );
    }

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/Client/Association/add", name="client_association_add")
     */
    public function linkClientAssociationAdresseAction(Request $request) {
        $clientAssociation = new ClientAssociation();
        $adresse = new Adresse();
        $login = new Login();

        $formData['client'] = $clientAssociation;
        $formData['adresse'] = $adresse;
        $formData['login'] = $login;

        $formClientAdresse = $this->createForm(ClientAssociationAdresseLoginType::class, $formData);

        $formClientAdresse->handleRequest($request);
        if ($formClientAdresse->isSubmitted() && $formClientAdresse->isValid()) {
            if ($login->getMotDePasse() == $login->getMotDePasseConf()) {
                $encoder = $this->get('security.password_encoder');
                $password = $encoder->encodePassword($login, $login->getMotDePasse());
                $login->setMotDePasse($password);
                /*
                 * 3) Sauvegarder le client
                 */
                $em = $this->getDoctrine()->getManager();
                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $clientAssociation->setAdresse($adresse);
                $clientAssociation->setLogin($login);
                $em->persist($adresse);
                $em->persist($login);
                $em->persist($clientAssociation);
                $em->flush();
                // store a message for the very next request
                $this->addFlash('notice', 'Félicitations, insertion réussie.');
                // redirection pour le fun
                return $this->redirectToRoute('inscrire_client');
            } else {
                $this->addFlash('errorPassword', "Le mot de passe ne correspond pas à la confirmation.");
            }
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.association.html.twig', array(
                    'form' => $formClientAdresse->createView())
        );
    }

    /**
     * @param Request $request
     * @return type
     * @Method({"GET","POST"})
     * @Route("/Client/Entreprise/add", name="client_entreprise_add")
     */
    public function linkClientEntrepriseAdresseAction(Request $request) {
        $clientEntreprise = new ClientEntreprise();
        $adresse = new Adresse();
        $login = new Login();

        $formData['client'] = $clientEntreprise;
        $formData['adresse'] = $adresse;
        $formData['login'] = $login;

        $formClientAdresse = $this->createForm(ClientEntrepriseAdresseLoginType::class, $formData);

        $formClientAdresse->handleRequest($request);
        if ($formClientAdresse->isSubmitted() && $formClientAdresse->isValid()) {
            if ($login->getMotDePasse() == $login->getMotDePasseConf()) {
                $encoder = $this->get('security.password_encoder');
                $password = $encoder->encodePassword($login, $login->getMotDePasse());
                $login->setMotDePasse($password);
                /*
                 * 3) Sauvegarder le client
                 */
                $em = $this->getDoctrine()->getManager();
                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $clientEntreprise->setAdresse($adresse);
                $clientEntreprise->setLogin($login);
                $em->persist($adresse);
                $em->persist($login);
                $em->persist($clientEntreprise);
                $em->flush();
                // store a message for the very next request
                $this->addFlash('notice', 'Félicitations, insertion réussie.');
                // redirection pour le fun
                return $this->redirectToRoute('inscrire_client');
            } else {
                $this->addFlash('errorPassword', "Le mot de passe ne correspond pas à la confirmation.");
            }
        }
        return $this->render(
                        'RocketfireAgenceMainBundle:Client:client.create.entreprise.html.twig', array(
                    'form' => $formClientAdresse->createView())
        );
    }

}
