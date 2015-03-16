<?php

namespace Mmi\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ArticleForm
 *
 * @author Johann Berthet
 */
class ArticleForm extends AbstractType {

	public function getName() {
        
        return 'article';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        
        $resolver->setDefaults(array(
            'data_class' => 'Mmi\Bundle\BlogBundle\Entity\Article',
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title')
        ->add('content', 'textarea', array(
            'label' => 'Contenu'
        ))
        ->add('save', 'submit', array(
           'label' => 'Envoyer',
           'attr'  => array(
                'class' => 'btn btn-primary'
           )
        ));
    }

}

?>