<?php

namespace Mmi\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of CommentForm
 *
 * @author Johann Berthet
 */
class CommentForm extends AbstractType {

	public function getName() {
        
        return 'comment';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        
        $resolver->setDefaults(array(
            'data_class' => 'Mmi\Bundle\BlogBundle\Entity\Comment',
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('autor')
        ->add('content', 'textarea', array(
            'label' => 'Contenu'
        ))
        ->add('save', 'submit', array(
           'label' => 'Envoyer',
           'attr'  => array(
                'class' => 'btn btn-primary'
           )
        ))
        ->add('idArticle', 'hidden');
    }

}

?>