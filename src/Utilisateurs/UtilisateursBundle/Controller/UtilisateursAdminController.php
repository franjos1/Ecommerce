<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UtilisateursAdminController extends Controller
{
    public function indexAction() // Ici on fait appel à tous les utilisateurs
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository('UtilisateursBundle:Utilisateurs')->findAll();
        
        return $this->render('UtilisateursBundle:Administration:Utilisateurs/layout/index.html.twig', array('utilisateurs' => $utilisateurs));
    }
    
    public function utilisateurAction($id)  // Cette méthode sera utile pour deux routes ou deux renvois de vues
    // Ici on fait appel à un seul utilisateur
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('UtilisateursBundle:Utilisateurs')->find($id);
        $route = $this->container->get('request')->get('_route');
        
        if ($route == 'adminAdressesUtilisateurs') {
            return $this->render('UtilisateursBundle:Administration:Utilisateurs/layout/adresses.html.twig', array('utilisateur' => $utilisateur));
        } else if ($route == 'adminFacturesUtilisateurs') {
            return $this->render('UtilisateursBundle:Administration:Utilisateurs/layout/factures.html.twig', array('utilisateur' => $utilisateur));
        } else {
            throw $this->createNotFoundException('La vue n\'existe pas.');
        }
    }
}
