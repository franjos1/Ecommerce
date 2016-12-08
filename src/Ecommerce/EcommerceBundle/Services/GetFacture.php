<?php
namespace Ecommerce\EcommerceBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GetFacture
{
    public function __construct(ContainerInterface $container) 
    {
        $this->container = $container;
    }                                                                                                                                    
    
    public function facture($facture)
    {
        // On stock la vue à convertir en PDF en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
        $html = $this->container->get('templating')->render('UtilisateursBundle:Default:layout/facturePDF.html.twig', array('facture' => $facture));
        
        // On instancie la class Html2Pdf_Html2Pdf en lui passant en paramètre
        // La sens de la page "portrait" => p ou "paysage" => l
        // Le format A4, A5 ...
        // La langue du document fr, en, it...
        $html2pdf = new \Html2Pdf_Html2Pdf('P', 'A4', 'fr');
        // On va ajouter l'auteur de notre site ecommerce
        $html2pdf->pdf->SetAuthor('Franjos-Ecommerce');
        // On va ajouter un titre à notre site ecommerce, on va aussi passer la référence 
        $html2pdf->pdf->SetTitle('Facture '.$facture->getReference());
        // On va ajouter le sujet
        $html2pdf->pdf->SetSubject('Facture Franjos-Ecommerce');
        // On va ajouter les keywords
        $html2pdf->pdf->Setkeywords('facture, Franjos-Ecommerce');
        // SetDisplayMode définit la manière dont le document PDF va être affiché par l'utilisateur
        // fullpage : affiche la page entière sur l'écran
        // fullwidth : utilise la largeur maximum de la fenêtre
        // real : utilise la taille réelle
        $html2pdf->pdf->SetDisplayMode('real');
        // writeHTML va tout simplement prendre la vue stocker dans la variable $html pour le convertir en format PDF
        $html2pdf->writeHTML($html);
        
        // Pour vous rappeller qu'il faut toujours retourner quelque chose dans vos méthodes de votre controller
        return $html2pdf;
    }        
}