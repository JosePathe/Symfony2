<?php

namespace Mmi\Bundle\BlogBundle\Controller;

use Mmi\Bundle\BlogBundle\Entity\Article;
use Mmi\Bundle\BlogBundle\Form\ArticleForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Description of ArticleController
 *
 * @author Johann Berthet
 */
class ArticleController extends Controller {


	/**
	 * @Route("/article/{id}/update", name="blog_article_update")
	 */
	public function updateAction($id, Request $request) {

		$article = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Article')->find($id);

		if(!$article) {
			throw $this->createNotFoundException();
		}

		//construction du formulaire
        $form = $this->createForm(new ArticleForm(), $article);

        $form->handleRequest($request);

        if ($form->isValid()) {
        	
        	$this->getDoctrine()->getManager()->flush();

        	return $this->redirect($this->generateUrl('blog_article_list'));
        }

        return $this->render('MmiBlogBundle:Article:update.html.twig', array(
        	'form' => $form->createView()
        ));

	}

	/**
	 * @Route("/article/{id}/delete", name="blog_article_delete")
	 */
	public function deleteAction($id) {

		$article = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Article')->find($id);

		if(!$article) {
			throw $this->createNotFoundException();
		}

		$this->getDoctrine()->getManager()->remove($article);
		$this->getDoctrine()->getManager()->flush();

		//redirection de l'utilisateur
        return $this->redirect($this->generateUrl('blog_article_list'));

	}

	/**
     * @Route("/article/create", name="blog_article_create")
     */
    public function createAction(Request $request) {

    	$article = new Article();
        
        //construction du formulaire
        $form = $this->createForm(new ArticleForm(), $article);

        $form->handleRequest($request);

        if ($form->isValid()) {
        	
        	$this->getDoctrine()->getManager()->persist($article);
        	$this->getDoctrine()->getManager()->flush();
        	return $this->redirect($this->generateUrl('blog_article_list'));
        }

        return $this->render('MmiBlogBundle:Article:create.html.twig', array(
        	'form' => $form->createView()
        ));
    }

    /**
     * @Route("/article/list", name="blog_article_list")
     */
    public function listeAction() {

    	$article = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Article')->findAll();

        return $this->render('MmiBlogBundle:Article:list.html.twig', array(
        	'articles' => $article
        ));

    }

}

?>