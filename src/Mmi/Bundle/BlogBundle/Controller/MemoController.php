<?php

namespace Mmi\Bundle\BlogBundle\Controller;

use Mmi\Bundle\BlogBundle\Form\MemoForm;
use Mmi\Bundle\BlogBundle\Model\Memo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of MemoController
 *
 * @author Johann Berthet
 */
class MemoController extends Controller {

    /**
     * @Route("/memo", name="blog_memo")
     */
    public function indexAction() {
        
        //construction du formulaire
        $form = $this->createForm(new MemoForm());

        //création de notre réponse, la vue de formulaire est envoyé au template
        return $this->get('templating')->renderResponse('MmiBlogBundle:Memo:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/memo/send", name="blog_memo_send")
     */
    public function sendAction(Request $request) {
        
        //création d'un objet memo vide
        $memo = new Memo();

        //construction du formulaire
        $form = $this->createForm(new MemoForm(), $memo);
        
        //transmission des données soumises par l'utilisateur aux propriétés de notre objet $memo
        $form->handleRequest($request);

        //vérifie que les données transmises sont valides
        if ($form->isValid()) {

            $memos = $request->getSession()->get('memos', array());
            $memos[] = $memo;

            $request->getSession()->set('memos', $memos);

            //redirection de l'utilisateur
            return $this->redirect($this->generateUrl('blog_memo_read'));

        }

        //si les données ne sont pas valides, on réaffiche le formulaire avec les erreurs
        return $this->get('templating')->renderResponse('MmiBlogBundle:Memo:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/memo/read", name="blog_memo_read")
     */
    public function readAction() {

        return $this->get('templating')->renderResponse('MmiBlogBundle:Memo:read.html.twig');

    }

    /**
     * @Route("/memo/deleteall", name="blog_memo_delete_all")
     */
    public function deleteAllAction(Request $request) {

        //intialisation du memo dans la session
        $request->getSession()->remove('memos');

        //redirection de l'utilisateur
        return $this->redirect($this->generateUrl('blog_memo_read'));

    }

    /**
     * @Route("/memo/delete/{index}", name="blog_memo_delete")
     */
    public function deleteAction($index, Request $request) {

        //intialisation du memo dans la session
        $memos = $request->getSession()->get('memos', array());

        if(!isset($memos[$index])) {
            throw $this->createNotFoundException();
        }

        unset($memos[$index]);

        $request->getSession()->set('memos', $memos);

        //$request->getSession()->remove('memos', $memos[$id]);

        //redirection de l'utilisateur
        return $this->redirect($this->generateUrl('blog_memo_read'));

    }

}

?>