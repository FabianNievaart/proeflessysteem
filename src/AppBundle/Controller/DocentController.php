<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Docent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Docent controller.
 *
 * @Route("admin/docent")
 */
class DocentController extends Controller
{
    /**
     * Lists all docent entities.
     *
     * @Route("/", name="admin_docent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $docents = $em->getRepository('AppBundle:Docent')->findAll();

        return $this->render('docent/index.html.twig', array(
            'docents' => $docents,
        ));
    }

    /**
     * Creates a new docent entity.
     *
     * @Route("/new", name="admin_docent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $docent = new Docent();
        $form = $this->createForm('AppBundle\Form\DocentType', $docent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($docent);
            $em->flush();

            return $this->redirectToRoute('admin_docent_show', array('id' => $docent->getId()));
        }

        return $this->render('docent/new.html.twig', array(
            'docent' => $docent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a docent entity.
     *
     * @Route("/{id}", name="admin_docent_show")
     * @Method("GET")
     */
    public function showAction(Docent $docent)
    {
        $deleteForm = $this->createDeleteForm($docent);

        return $this->render('docent/show.html.twig', array(
            'docent' => $docent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing docent entity.
     *
     * @Route("/{id}/edit", name="admin_docent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Docent $docent)
    {
        $deleteForm = $this->createDeleteForm($docent);
        $editForm = $this->createForm('AppBundle\Form\DocentType', $docent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_docent_edit', array('id' => $docent->getId()));
        }

        return $this->render('docent/edit.html.twig', array(
            'docent' => $docent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a docent entity.
     *
     * @Route("/{id}", name="admin_docent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Docent $docent)
    {
        $form = $this->createDeleteForm($docent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($docent);
            $em->flush();
        }

        return $this->redirectToRoute('admin_docent_index');
    }

    /**
     * Creates a form to delete a docent entity.
     *
     * @param Docent $docent The docent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Docent $docent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_docent_delete', array('id' => $docent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
