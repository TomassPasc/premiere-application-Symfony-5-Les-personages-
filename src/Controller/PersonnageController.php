<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig');
    }


    /**
     * @Route("/persos", name="personnages")
     */
    public function persos()
    {
        Personnage::creerPersonnages();
        return $this->render('personnage/persos.html.twig',[
            "players" => Personnage::$personnages
        ]);
    }

        /**
     * @Route("/persos/{pseudo}", name="afficher_personnage")
     */
    public function afficherPerso($pseudo)
    {
        Personnage::creerPersonnages();
        $perso = Personnage::getPersonnageParNom($pseudo);
        return $this->render('personnage/perso.html.twig',[
            "perso" => $perso
        ]);
    }

}

