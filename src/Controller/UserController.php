<?php

namespace App\Controller;

use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends AbstractController
{


    /**
     * @Route("/api/getsingleuser/{id}", name="get_single_user"  , methods={"GET"}, requirements={"id"="\d+"})
     */
    public function getSingleUser(EntityManagerInterface $em, Request $request, $id): Response
    {


        $user = $em->getRepository(User::class)->find($id);
        $name = $user->getNom();
        $lastname = $user->getPrenom();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $cin = $user->getCin();
        $datenais = $user->getDateNai();
        $adresse = $user->getAdresse();
        $date_embauche = $user->getDateEmbauche();
        $phone = $user->getPhone();
        $fax = $user->getFax();
        $image = $user->getImage();
        $matricule = $user->getMatricule();
        $poste = $user->getPoste()->getName();
        $response = new Response();
        $response->setContent(json_encode([
            'name' => $name,
            'lastname' => $lastname,
            'username' => $username,
            'email' => $email,
            'cin' => $cin,
            'datenais' => $datenais,
            'dateemb' => $date_embauche,
            'phone' => $phone,
            'fax' => $fax,
            'image' => $image,
            'matricule' => $matricule,
            'poste' => $poste,
            'adresse' => $adresse,
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return ($response);
    }


    /**
     * @Route("/api/getusername/{id}", name="get_username"  , methods={"GET"}, requirements={"id"="\d+"})
     */
    public function getUsername(EntityManagerInterface $em, Request $request, $id): Response
    {

        $user = $em->getRepository(User::class)->find($id);
        $name = $user->getNom();
        $lastname = $user->getPrenom();
        
        $response = new Response();
        $response->setContent(json_encode([
            'name' => $name,
            'lastname' => $lastname,
            
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return ($response);
    }
}
