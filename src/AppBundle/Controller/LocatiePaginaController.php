<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LocatiePaginaController extends Controller
{
	/**
	 * @Route("/locatie", name="locatie")
	 */
		public function indexAction(Request $request)
		{
			// replace this example code with whatever you need
			return $this->render('locatie.html.twig', [
				'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
			]);
		}
}
