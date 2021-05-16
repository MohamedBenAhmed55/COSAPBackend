<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsController extends AbstractController
{
    /**
     * @Route("/api/statistics/{id}", name="statistics", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function index(EntityManagerInterface $em, $id): JsonResponse
    {
        $users = $em->getRepository(User::class)->findBy(['company' => $id]);
        $Data = array();
        $present =0;
        $conge=0;
        $mission=0;
        $intérim=0;


        for ($i = 0; $i < sizeof($users); $i++) {
        
            if(strcmp($users[$i]->getEtatPresence(),"Présent") == 0 ){
                $present++;
            }
            if(strcmp($users[$i]->getEtatPresence(),"En congé") == 0 ){
                $conge++;
            }
            if(strcmp($users[$i]->getEtatPresence(),"En mission") == 0 ){
                $mission++;
            }
            if(strcmp($users[$i]->getEtatPresence(),"En intérim") == 0 ){
                $intérim++;
            }
            
        }
        $test = array(
            'present' =>$present,
            'conge' => $conge,
            'mission' => $mission,
            'interim' => $intérim,
        );
        array_push($Data, $test);
        


        $response = new JsonResponse();
        $response->setData(['data' => $Data]);
        return ($response);
    }
}
