<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Proefles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proefle controller.
 *
 * @Route("admin/proefles")
 */
class ProeflesController extends Controller
{
    /**
     * Lists all proefle entities.
     *
     * @Route("/", name="admin_proefles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proefles = $em->getRepository('AppBundle:Proefles')->findAll();

        return $this->render('proefles/index.html.twig', array(
            'proefles' => $proefles,
        ));
    }

    /**
     * Creates a new proefle entity.
     *
     * @Route("/new", name="admin_proefles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proefle = new Proefle();
        $form = $this->createForm('AppBundle\Form\ProeflesType', $proefle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proefle);
            $em->flush();

            return $this->redirectToRoute('admin_proefles_show', array('id' => $proefle->getId()));
        }

        return $this->render('proefles/new.html.twig', array(
            'proefle' => $proefle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proefle entity.
     *
     * @Route("/{id}", name="admin_proefles_show")
     * @Method("GET")
     */
    public function showAction(Proefles $proefle)
    {
        $deleteForm = $this->createDeleteForm($proefle);

        return $this->render('proefles/show.html.twig', array(
            'proefle' => $proefle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proefle entity.
     *
     * @Route("/{id}/edit", name="admin_proefles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Proefles $proefle)
    {
        $deleteForm = $this->createDeleteForm($proefle);
        $editForm = $this->createForm('AppBundle\Form\ProeflesType', $proefle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_proefles_edit', array('id' => $proefle->getId()));
        }

        return $this->render('proefles/edit.html.twig', array(
            'proefle' => $proefle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proefle entity.
     *
     * @Route("/{id}", name="admin_proefles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Proefles $proefle)
    {
        $form = $this->createDeleteForm($proefle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proefle);
            $em->flush();
        }

        return $this->redirectToRoute('admin_proefles_index');
    }

    /**
     * Creates a form to delete a proefle entity.
     *
     * @param Proefles $proefle The proefle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proefles $proefle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_proefles_delete', array('id' => $proefle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
