<?php

namespace Mmi\Bundle\BlogBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="blog_homepage")
     */
    public function homepageAction()
    {
        return $this->get('templating')->renderResponse('MmiBlogBundle:Default:homepage.html.twig');

    }
}
