<?php

namespace RocketfireAgenceMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RocketfireAgenceMainBundle\Form\Type\CompagnieAerienneVolType;
use RocketfireAgenceMainBundle\Entity\CompagnieAerienneVol;
use Symfony\Component\HttpFoundation\Request;

class CompagnieAerienneVolController extends Controller
{
    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienneVol/add", host="agence.local", name="CompagnieAerienneVol_add")
     */
    public function createCompagnieAerienneVolAction(Request $request)
    {
        /*
         * 1) Construire le formulaire
         */
        $compagnieAerienneVol = new CompagnieAerienneVol();
        $form = $this->createForm(CompagnieAerienneVolType::class, $compagnieAerienneVol);
        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder la compagnieAerienneVol
             */
            /*
             * This line fetches Doctrine's entity manager object, which is responsible
             * for the process of persisting objects to, and fetching objects from,
             * the database
             */
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($compagnieAerienneVol);
            /*
             * When the flush() method is called, Doctrine looks through all of the
             * objects
             * that it's managing to see if they need to be persisted to the database.
             * In this example, the $product object's data doesn't exist in the database,
             * so the entity manager executes an INSERT query, creating a new row in the
             * product table.
             * Actually executes the queries (i.e. the INSERT query)
             */
            $em->flush();
            // store a message for the very next request
            $this->addFlash('notice', 'Félicitations, insertion réussie.');
            // redirection pour le fun
            return $this->redirectToRoute('CompagnieAerienneVol_list');
        }

        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienneVol:create_compagnie_aerienne_vol.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienneVol/edit/{id}", host="agence.local", name="CompagnieAerienneVol_edit")
     *
     * @param Request $request
     * @param int     $id
     *
     * @return type
     *
     * @throws type
     */
    public function editCompagnieAerienneVolAction(Request $request, $id)
    {
        /*
         * 0) Vérifier l'existence du cinéma
         */
        $em = $this->getDoctrine()->getManager();
        $compagnieAerienneVol = $em->getRepository('RocketfireAgenceMainBundle:CompagnieAerienneVol')->find($id);
        if (!$compagnieAerienneVol) {
            throw $this->createNotFoundException(
                    'No compagnieAerienneVol found for id '.$id
            );
        }
        /*
         * 1) Construire le formulaire
         */
        $form = $this->createForm(CompagnieAerienneVolType::class, $compagnieAerienneVol);

        /*
         * 2) Gérer la soumission du formulaire
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /*
             * 3) Sauvegarder le cinéma
             */
            $em->flush();
            // store a message for the very next request
            $this->addFlash('notice', 'Mise à jour réussie.');
            // redirection
            return $this->redirectToRoute('CompagnieAerienneVol_list');
        }

        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienneVol:edit_compagnie_aerienne_vol.html.twig', [
                    'form' => $form->createView(),
                    'compagnieAerienneVol' => $compagnieAerienneVol,
            
        ]);
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienneVol/delete/{id}", host="agence.local", name="CompagnieAerienneVol_delete")
     *
     * @param int $id
     *
     * @return type
     *
     * @throws type
     */
    public function deleteCompagnieAerienneVolAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $compagnieAerienneVol = $em->getRepository('RocketfireAgenceMainBundle:CompagnieAerienneVol')->find($id);
        if (!$compagnieAerienneVol) {
            throw $this->createNotFoundException(
                    'No compagnieAerienneVol found for id '.$compagnieAerienneVolId
            );
        }
        $em->remove($compagnieAerienneVol);
        $em->flush();
        // store a message for the very next request
        $this->addFlash('notice', 'Suppression réussie.');

        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienneVol:delete_compagnie_aerienne_vol.html.twig', [
                    [
                        'compagnieAerienneVol' => $compagnieAerienneVol, ],
        ]);
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienneVol/show/{id}", host="agence.local", name="CompagnieAerienneVol_show")
     *
     * @param int $id
     */
    public function showCompagnieAerienneVolAction($id)
    {
        // on récupère le repository
        // PHP class whose only job is to help you fetch entities of a certain class
        $compagnieAerienneVol = $this->getDoctrine()
                ->getRepository('RocketfireAgenceMainBundle:CompagnieAerienneVol')
                ->find($id);
        if (!$compagnieAerienneVol) {
            throw $this->createNotFoundException(
                    'No compagnieAerienneVol found for id '.$id
            );
        }

        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienneVol:show_compagnie_aerienne_vol.html.twig', [
                    'compagnieAerienneVol' => $compagnieAerienneVol, ]
        );
    }

    /**
     * @Method({"GET","POST"})
     * @Route("/CompagnieAerienneVol/list", host="agence.local", name="CompagnieAerienneVol_list")
     */
    public function listCompagnieAerienneVolAction()
    {
        // on récupère le repository
        // PHP class whose only job is to help you fetch entities of a certain class
        $compagnieAerienneVols = $this->getDoctrine()
                ->getRepository('RocketfireAgenceMainBundle:CompagnieAerienneVol')
                ->findAll();
        if (!$compagnieAerienneVols) {
            throw $this->createNotFoundException(
                    'No compagnieAerienneVol found !'
            );
        }

        return $this->render('RocketfireAgenceMainBundle:CompagnieAerienneVol:list_compagnie_aerienne_vol.html.twig', [
                    'compagnieAerienneVols' => $compagnieAerienneVols, ]
        );
    }
}
