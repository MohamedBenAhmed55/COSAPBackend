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
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/login.html.twig');
    }

    /**
     * @Route("/profile", name="api_profile")
     * @IsGranted("ROLE_USER")
     */
    public function profile()
    {
        return $this->json(
            [
                'user' => $this->getUser()
            ],
            200,
            [],
            [
                'groups' => ['api']
            ]
        );
    }

    /**
     * @Route("/api/modifypassword", name="api_modif_pass" , methods={"POST"})
     */
    public function modifypass(Request $request)
    {
        $modify_user = json_decode(
            $request->getContent(),
            true
        );

        $user = $this->repository->find($modify_user->id);
        $user->setPassword($modify_user->password);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
    }

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
        $adresse= $user->getAdresse();
        $date_embauche = $user->getDateEmbauche();
        $phone = $user->getPhone();
        $fax= $user->getFax();
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
            'fax'=>$fax,
            'image' => $image,
            'matricule' => $matricule,
            'poste' => $poste,
            'adresse'=> $adresse,
        ]));
        $response->headers->set('Content-Type', 'application/json');
        // $response->setContent($request);
        return ($response);
    }
}
