<?php

namespace App\Form;

use App\Entity\StoreOrder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status',   HiddenType::class)
            ->add('sessionId',HiddenType::class)
            ->add('userName', TextType::class, [
                'label' => 'Your Full Name'
            ])
            ->add('userEmail',EmailType::class, [
                'label' => 'Your personal email'
            ])
            ->add('userPhone',TextType::class, [
                'label' => 'Number of your personal phone'
            ])
            ->add('save',   SubmitType::class, [
                'label' => 'Submit'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StoreOrder::class,
        ]);
    }
}
