<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CommandesAdminController extends Controller
{
    public function commandesAction() 
    {
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('EcommerceBundle:Commandes')->findAll();
        
        return $this->render('EcommerceBundle:Administration:commandes/layout/index.html.twig', array('commandes' => $commandes));
    }
    
    public function showFactureAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('EcommerceBundle:Commandes')->find($id);
        
        if(!$facture){
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('adminCommande'));
        }
        
        // Permet d'appeler notre service facture et lui placer "Output('Facture.pdf')"
        $this->container->get('setNewFacture')->facture($facture)->Output('Facture.pdf');
        
        $response = new Response();
        $response->headers->set('Content-type', 'application/pdf');
        
        return $response;
    }
}
