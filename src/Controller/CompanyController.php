<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Groupe;
use App\Entity\Poste;
use App\Entity\Salle;
use App\Entity\User;
use ArrayObject;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * Undocumented variable
     *
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
    }

    /**
     * @Route("/api/company_Names", name="company_Names", methods={"GET"})
     */
    public function GetCompanyByName(EntityManagerInterface $em): JsonResponse
    {
        $Companies = $em->getRepository(Company::class)->findAll();
        $CompanyData = array();

        for ($i = 0; $i < sizeof($Companies); $i++) {
            $test = array(
                'name' => $Companies[$i]->getName(),
                'id' => $Companies[$i]->getId()
            );
            array_push($CompanyData, $test);
        }

        $response = new JsonResponse();
        $response->setData(['data' => $CompanyData]);
        return ($response);
    }

    /**
     * @Route("/api/salles_Names", name="salles_Names", methods={"GET"})
     */
    public function GetSallesByName(EntityManagerInterface $em): JsonResponse
    {
        $salles = $em->getRepository(Salle::class)->findAll();
        $sallesData = array();
        for ($i = 0; $i < sizeof($salles); $i++) {
            $test = array(
                'name' => $salles[$i]->getNom(),
                'id' => $salles[$i]->getId()
            );
            array_push($sallesData, $test);
        }

        $response = new JsonResponse();
        $response->setData(['data' => $sallesData]);
        return ($response);
    }

    /**
     * @Route("/api/postes_Names", name="postes_Names", methods={"GET"})
     */
    public function GetPosteByName(EntityManagerInterface $em): JsonResponse
    {
        $postes = $em->getRepository(Poste::class)->findAll();
        $postesData = array();
        for ($i = 0; $i < sizeof($postes); $i++) {
            $test = array(
                'name' => $postes[$i]->getNom(),
                'id' => $postes[$i]->getId()
            );
            array_push($postesData, $test);
        }
        $response = new JsonResponse();
        $response->setData(['data' => $postesData]);
        return ($response);
    }

     /**
     * @Route("/api/groupes_Names", name="groupes_Names", methods={"GET"})
     */
    public function GetGroupByName(EntityManagerInterface $em): JsonResponse
    {
        $groupes = $em->getRepository(Groupe::class)->findAll();
        $groupesData = array();
        for ($i = 0; $i < sizeof($groupes); $i++) {
            $test = array(
                'name' => $groupes[$i]->getName(),
                'id' => $groupes[$i]->getId()
            );
            array_push($groupesData, $test);
        }
        $response = new JsonResponse();
        $response->setData(['data' => $groupesData]);
        return ($response);
    }

     /**
     * @Route("/api/users_Names", name="users_Names", methods={"GET"})
     */
    public function GetUserByName(EntityManagerInterface $em): JsonResponse
    {
        $users = $em->getRepository(User::class)->findAll();
        $usersData = array();
        for ($i = 0; $i < sizeof($users); $i++) {
            $test = array(
                'name' => $users[$i]->getNom() . ' ' .$users[$i]->getPrenom() ,
                'id' => $users[$i]->getId()
            );
            array_push($usersData, $test);
        }
        $response = new JsonResponse();
        $response->setData(['data' => $usersData]);
        return ($response);
    }

    // /**
    //  * @Route("/api/getsingleuser", name="get_single_user"  , methods={"GET"})
    //  */
    // public function getSingleUser(EntityManagerInterface $em): JsonResponse{

    //     $user = $em->getRepository(User::class)->find(13);
    //     $response = new JsonResponse();
    //     $response->setData(['data' => $user]);
    //     return ($response);
    // }

    


    

}
