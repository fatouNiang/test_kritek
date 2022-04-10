<?php

namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\InvoiceLineFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('invoiceDate')
            ->add('invoiceNumber', HiddenType::class)
            ->add('costumerId')
            ->add('invoiceLine', CollectionType::class, [
                'entry_type' => InvoiceLineFormType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
           ->add('submit', SubmitType::class, ['attr' => ['class' => 'btn btn-primary'], 'label' => 'Create invoice'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
