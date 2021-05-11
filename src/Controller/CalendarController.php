<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Conge;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalendarController extends AbstractController
{
    /**
     * @Route("/api/calendarevents", name="calendarevents", methods={"GET"})
     */
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $Conges = $em->getRepository(Conge::class)->findAll();
        $CongesData = array();

        for ($i = 0; $i < sizeof($Conges); $i++) {
        //    $date =array($Conges[$i]->getDateReprise());
        $date=json_decode($Conges[$i]->getDateReprise());
 
            $test = array(
                'titre' =>"Reprise du travail",
                'date' => $date,
            );
            array_push($CongesData, $test);
        }

        $response = new JsonResponse();
        $response->setData(['data' => $CongesData]);
        return ($response);
    }
}
