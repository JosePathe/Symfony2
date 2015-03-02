<?php

namespace Mmi\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of MemoForm
 *
 * @author Johann Berthet
 */
class MemoForm extends AbstractType {
    
    public function getName() {
        
        return 'memo';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        
        $resolver->setDefaults(array(
            'data_class' => 'Mmi\Bundle\BlogBundle\Model\Memo',
        ));
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('id', 'hidden', array(
            'data' => uniqid()
        ))
        ->add('message', 'textarea', array(
            'label' => 'Message'
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
