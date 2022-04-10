<?php

namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('invoiceDate')
            ->add('invoiceNumber')
            ->add('costumerId')
            ->add('invoiceline', CollectionType::class, [
                'entry_type' => InvocelinesFormType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
           // ->add('submit', SubmitType::class)
           ->add('save', SubmitType::class, ['attr' => ['class' => 'btn btn-primary'], 'label' => 'Create invoce'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
