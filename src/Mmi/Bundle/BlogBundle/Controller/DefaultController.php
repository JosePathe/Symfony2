<?php

namespace Mmi\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/blogbundle")
     * *@Template()
     */
    public function indexAction()
    {
        /*return array('name' => $name);*/
        return $this->get('templating')->renderResponse('MmiBlogBundle:Default:index.html.twig');
    }
}
