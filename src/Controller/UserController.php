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
    return $this->json([
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
    public function modifypass(Request $request){
        $modify_user= json_decode(
            $request->getContent(),
            true
        );

        $user= $this->repository->find($modify_user->id);
        $user->setPassword($modify_user->password);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        
    }
}
