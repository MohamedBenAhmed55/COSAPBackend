<?php

namespace App\Controller;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function GetCompanyByName(EntityManagerInterface $em): Response
    {
        $Companies= $em->getRepository(Company::class)->findAll();
        return $Companies;
       
    }
}
