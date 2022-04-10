<?php

namespace App\Controller;
use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceFormType;
use App\Form\InvoiceLineFormType;
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
        $invoice->getInvoiceLine()->add($invoiceLine);
        $form= $this->createForm(InvoiceFormType::class, $invoice);
         if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
             $invoiceLine = $invoice->getInvoiceLine();
            
             $last_id_record =  $em->getRepository(Invoice::class)->findOneBy([], ['id' => 'desc']);
             $invoice->setInvoiceNumber($last_id_record ?  (int)$last_id_record->getId() + 1 : 1);
             $em->persist($invoice);
             foreach($lines as $singleLine ){
                 $amount_without_vat = $singleLine->getQuantity() * $singleLine->getAmount();
                 $amount_TVA = ($amount_without_vat * $TVA) / 100;
                 $total = $amount_vat + $amount_without_vat;
                 $singleLine->setTotal($total);
        //         $singleLine->setVatAmount($amount_vat);
        //         $singleLine->setInvoce($invoce);
    /         $em->persist($singleLine);
             }
            
             $em->flush();
             unset($form);
             unset($invoice);
             unset($invoiceLine);
             $invoice = new Invoice();
             $invoiceLine = new InvoiceLine();
             $invoice->getInvocieLine()->add($invoiceLine);
             $form = $this->createForm(InvoiceFormType::class, $invoice);
         }
        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
