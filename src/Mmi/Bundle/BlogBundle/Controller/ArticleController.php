<?php

namespace Mmi\Bundle\BlogBundle\Controller;

use Mmi\Bundle\BlogBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller {

	/**
	 * @Route("/article/create", name="blog_article_create")
	 */
	public function createAction(){

		$article = new Article();
		$article->setTitle('1er Article');
		$article->setContent('ddvuievbuvnefheifhiififehiofeifheifhvk,ekvjeoi');

		$this->getDoctrine()->getManager()->persist($article);
		$this->getDoctrine()->getManager()->flush();
	}

	/**
	 * @Route("/article/{id}/update", name="blog_article_update")
	 */
	public function updateAction($id) {

		$article = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Article')->find($id);

		if(!$article) {
			throw $this->createNotFoundException();
			
		}

		$article->setTitle('Nouvelle valeur');

		$this->getDoctrine()->getManager()->flush();
	}


}

?>