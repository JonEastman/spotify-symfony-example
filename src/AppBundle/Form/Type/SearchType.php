<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('searchText', 'text', array('attr' => array('placeholder' => 'Enter Artist, Album or song'), 'label' => false, 'required' => true))
            ->getForm();
    }

    public function getName()
    {
        return 'spotify_search';
    }
}