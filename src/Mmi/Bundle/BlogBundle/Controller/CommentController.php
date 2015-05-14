<?php

namespace Mmi\Bundle\BlogBundle\Controller;

use Mmi\Bundle\BlogBundle\Entity\Comment;
use Mmi\Bundle\BlogBundle\Form\CommentForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Description of CommentController
 *
 * @author Johann Berthet
 */
class CommentController extends Controller {


	/**
	 * @Route("/comment/{id}/update", name="blog_comment_update")
	 */
	public function updateAction($id, Request $request) {

		$comment = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Comment')->find($id);

		if(!$comment) {
			throw $this->createNotFoundException();
		}

		//construction du formulaire
        $form = $this->createForm(new CommentForm(), $comment);

        $form->handleRequest($request);

        if ($form->isValid()) {
        	
        	$this->getDoctrine()->getManager()->flush();

        	return $this->redirect($this->generateUrl('blog_comment_list'));
        }

        return $this->render('MmiBlogBundle:Comment:update.html.twig', array(
        	'form' => $form->createView()
        ));

	}

	/**
	 * @Route("/comment/{id}/delete", name="blog_comment_delete")
	 */
	public function deleteAction($id) {

		$comment = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Comment')->find($id);

		if(!$comment) {
			throw $this->createNotFoundException();
		}

		$this->getDoctrine()->getManager()->remove($comment);
		$this->getDoctrine()->getManager()->flush();

		//redirection de l'utilisateur
        return $this->redirect($this->generateUrl('blog_comment_list'));

	}

	/**
     * @Route("/comment/create", name="blog_comment_create")
     */
    public function createAction(Request $request) {

    	$comment = new Comment();
        
        //construction du formulaire
        $form = $this->createForm(new CommentForm(), $comment);

        $form->handleRequest($request);

        if ($form->isValid()) {
        	
        	$this->getDoctrine()->getManager()->persist($comment);
        	$this->getDoctrine()->getManager()->flush();
        	return $this->redirect($this->generateUrl('blog_article_list'));
        }

        return $this->render('MmiBlogBundle:Article:list.html.twig', array(
        	'form' => $form->createView()
        ));
    }

    /**
     * @Route("/comment/list", name="blog_comment_list")
     */
    public function listeAction() {

    	$comment = $this->getDoctrine()->getManager()->getRepository('MmiBlogBundle:Comment')->findAll();

        /*return $this->render('MmiBlogBundle:Article:list.html.twig', array(
        	'comments' => $comment
        ));*/

        return $this->redirect($this->generateUrl('blog_article_list'));

    }

}

?>