<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('nom', 'text', array('attr' => array('class' => 'form-control')))
            ->add('description', 'textarea', array('attr' => array('class' => 'form-control')))
            ->add('prix', 'text', array('attr' => array('class' => 'form-control')))
            ->add('disponible', 'checkbox', array('attr' => array('class' => 'checkbox')))
            ->add('image', new MediaType())
            ->add('categorie', 'entity', array(
                'attr' => array('class' => 'form-control'),
                'class' => 'EcommerceBundle:Categories',
                'property' => 'nom',
                'multiple' => false
            ))
            ->add('tva', 'entity', array(
                'attr' => array('class' => 'form-control'),
                'class' => 'EcommerceBundle:Tva',
                'property' => 'nom',
                'multiple' => false
            ))
            ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\Produits'
        ));
    }

}
