<?php

namespace Mmi\Bundle\BlogBundle\Controller;

use Mmi\Bundle\BlogBundle\Entity\Article;
use Mmi\Bundle\BlogBundle\Form\ArticleForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Mmi\Bundle\BlogBundle\Entity\Comment;
use Mmi\Bundle\BlogBundle\Form\CommentForm;


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

        	return $this->redirect($this->generateUrl('blog_article_read', array ('id' => $id)));
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
        return $this->redirect($this->generateUrl('blog_article_read', array ('id' => $id)));

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
        	return $this->redirect($this->generateUrl('blog_article_read', array ('id' => $article->getId())));
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

        $comments = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Comment')->findAll();

        return $this->render('MmiBlogBundle:Article:list.html.twig', array(
        	'articles' => $article,
            'comments' => $comments,
        ));

    }

    /**
     * @Route("/article/{id}/read", name="blog_article_read")
     */
    public function readAction($id, Request $request) {

        $article = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Article')->find($id);

        $comments = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Comment')->findBy(array ('idArticle' => $id));

        $comment = new Comment($id);
        
        //construction du formulaire
        $form = $this->createForm(new CommentForm(), $comment);

        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('blog_article_read', array ('id' => $id)));
        }

        return $this->render('MmiBlogBundle:Article:read.html.twig', array(
            'article' => $article,
            'comments' => $comments,
            'form' => $form->createView()
        ));

    }

    /**
     * @Route("/article/search", name="blog_article_search")
     */
    public function listSearchAction(Request $request) {

        if (isset($_POST['keyword'])&& $_POST['keyword']!=""){
            $keyword = $_POST['keyword'];
        }

        $articles = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Article')->findByTitle($keyword);

        return $this->render('MmiBlogBundle:Article:search.html.twig', array(
            'articles' => $articles,
        ));

    }

}

?>