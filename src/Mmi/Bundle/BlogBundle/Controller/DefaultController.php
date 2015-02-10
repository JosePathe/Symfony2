<?php

namespace Mmi\Bundle\BlogBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="blog_homepage")
     */
    public function homepageAction()
    {
        return $this->get('templating')->renderResponse('MmiBlogBundle:Default:homepage.html.twig');
    }

    /**
     * @Route("/theme/{name}", name="blog_theme")
     */
    public function themeAction($name, Request $request)
	{
	    $request->getSession()->set('theme', $name);
	    return $this->redirect($this->generateUrl('blog_homepage'));
	}
}