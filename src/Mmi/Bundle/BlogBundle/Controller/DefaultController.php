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
        //stockage du nom du thème dans la session
	    $request->getSession()->set('theme', $name);

        //redirection de l'utilisateur
	    return $this->redirect($this->generateUrl('blog_homepage'));
	}

    /**
     * @Route("/page", name="blog_page")
     */
    public function pageAction()
    {
        return $this->get('templating')->renderResponse('MmiBlogBundle:Default:page.html.twig');
    }
}
