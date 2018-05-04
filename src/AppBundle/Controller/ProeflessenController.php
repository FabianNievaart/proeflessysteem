<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Proeflessen;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proeflessen controller.
 *
 * @Route("admin/proeflessen")
 */
class ProeflessenController extends Controller
{
    /**
     * Lists all proeflessen entities.
     *
     * @Route("/", name="admin_proeflessen_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proeflessens = $em->getRepository('AppBundle:Proeflessen')->findAll();

        return $this->render('proeflessen/index.html.twig', array(
            'proeflessens' => $proeflessens,
        ));
    }

    /**
     * Creates a new proeflessen entity.
     *
     * @Route("/new", name="admin_proeflessen_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proeflessen = new Proeflessen();
        $form = $this->createForm('AppBundle\Form\ProeflessenType', $proeflessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proeflessen);
            $em->flush();

            return $this->redirectToRoute('admin_proeflessen_show', array('id' => $proeflessen->getId()));
        }

        return $this->render('proeflessen/new.html.twig', array(
            'proeflessen' => $proeflessen,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proeflessen entity.
     *
     * @Route("/{id}", name="admin_proeflessen_show")
     * @Method("GET")
     */
    public function showAction(Proeflessen $proeflessen)
    {
        $deleteForm = $this->createDeleteForm($proeflessen);

        return $this->render('proeflessen/show.html.twig', array(
            'proeflessen' => $proeflessen,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proeflessen entity.
     *
     * @Route("/{id}/edit", name="admin_proeflessen_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Proeflessen $proeflessen)
    {
        $deleteForm = $this->createDeleteForm($proeflessen);
        $editForm = $this->createForm('AppBundle\Form\ProeflessenType', $proeflessen);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_proeflessen_edit', array('id' => $proeflessen->getId()));
        }

        return $this->render('proeflessen/edit.html.twig', array(
            'proeflessen' => $proeflessen,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proeflessen entity.
     *
     * @Route("/{id}", name="admin_proeflessen_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Proeflessen $proeflessen)
    {
        $form = $this->createDeleteForm($proeflessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proeflessen);
            $em->flush();
        }

        return $this->redirectToRoute('admin_proeflessen_index');
    }

    /**
     * Creates a form to delete a proeflessen entity.
     *
     * @param Proeflessen $proeflessen The proeflessen entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proeflessen $proeflessen)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_proeflessen_delete', array('id' => $proeflessen->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
