<?php

namespace App\Form;

use App\Entity\InvoiceLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class InvoiceLineFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('decription')
            ->add('quantity')
            ->add('amount')
            ->add('amount_TVA', HiddenType::class)
            ->add('totalTVA', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceLine::class,
        ]);
    }
}