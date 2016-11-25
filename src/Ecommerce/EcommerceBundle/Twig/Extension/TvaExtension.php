<?php
namespace Ecommerce\EcommerceBundle\Twig\Extension;

class TvaExtension extends \Twig_Extension
{
    public function getFilters() 
    {
        return array(new \Twig_SimpleFilter('tva', array($this, 'calculTva')));
    }
    
    function calculTva($prixHT, $tva)
    {
        return round($prixHT * $tva, 2); // la tva = (1 + 19,25/100)
    }        
    
    public function getName() 
    {
        return 'tva_extension';
    }
}