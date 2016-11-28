<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateursAdressesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('attr' => array('class' => 'form-control')))
            ->add('prenom', null, array('attr' => array('class' => 'form-control')))
            ->add('telephone', null, array('attr' => array('class' => 'form-control')))
            ->add('adresse', null, array('attr' => array('class' => 'form-control')))
            ->add('cp', null, array('attr' => array('class' => 'form-control',
                                                    'maxlength' => 5)))
            ->add('ville', null, array('attr' => array('class' => 'form-control')))
            ->add('pays', 'country', array('attr' => array('class' => 'form-control')))
            ->add('complement', null, array('required' => false, 'attr' => array('class' => 'form-control')))
            // ->add('utilisateur')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses'
        ));
    }
}
