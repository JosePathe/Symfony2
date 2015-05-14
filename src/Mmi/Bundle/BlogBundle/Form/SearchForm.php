<?php

namespace Mmi\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of SearchForm
 *
 * @author Johann Berthet
 */
class SearchForm extends AbstractType {

	public function getName() {
        
        return 'Search';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        
        $resolver->setDefaults(array(
            'data_class' => 'Mmi\Bundle\BlogBundle\Entity\Search',
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('keyword')
        ->add('save', 'submit', array(
           'label' => 'Chercher',
           'attr'  => array(
                'class' => 'btn btn-default'
           )
        ));
    }

}

?>