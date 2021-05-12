<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Conge;
use App\Entity\JoursFeries;
use App\Entity\Tache;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalendarController extends AbstractController
{
    /**
     * @Route("/api/calendarevents/{id}", name="calendarevents", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function index(EntityManagerInterface $em, $id): JsonResponse
    {
        $Conges = $em->getRepository(Conge::class)->findBy(['user' => $id]);
        $Data = array();

        for ($i = 0; $i < sizeof($Conges); $i++) {
        //    $date =array($Conges[$i]->getDateReprise());
        // $date=json_decode($Conges[$i]->getDateReprise());
 
            $test = array(
                'titre' =>"Reprise du travail",
                'date' => $Conges[$i]->getDateReprise(),
            );
            array_push($Data, $test);
        }
        $JrFer= $em->getRepository(JoursFeries::class)->findAll();

        for($i = 0;$i<sizeof($JrFer);$i++){
            $test2 = array(
                'titre' =>$JrFer[$i]->getTitre(),
                'date' => $JrFer[$i]->getDate(),
            );
            array_push($Data, $test2);
        }

        $Taches= $em->getRepository(Tache::class)->findBy(['user_destinataire' => $id]);

        for($i = 0;$i<sizeof($Taches);$i++){
            $test2 = array(
                'titre' =>$Taches[$i]->getLibelle(),
                'date' => $Taches[$i]->getDateFin(),
            );
            array_push($Data, $test2);
        }

        $response = new JsonResponse();
        $response->setData(['data' => $Data]);
        return ($response);
    }
}
