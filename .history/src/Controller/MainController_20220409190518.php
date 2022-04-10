<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $em= $doctrine->getManager();
        $TVA = 18;
        $invoice= new Invoice();
        $invoiceLine= new InvoiceLine();
        $invoice->get
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
