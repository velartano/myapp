<?php

namespace App\Form\Type; 
use Symfony\Component\Form\AbstractType; 
use Symfony\Component\Form\Extension\Core\Type\DateType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;  
use Symfony\Component\Form\FormBuilderInterface; 
use Symfony\Component\OptionsResolver\OptionsResolver;


class BienType extends AbstractType { 
    
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    { 
        $builder->add('titre', TextType :: class)
                 ->add('prix', IntegerType :: class)
                 ->add('ville', TextType :: class)
                 ->add('surface', TextType :: class);
                 //->add('Enregistrer', SubmitType :: class);
    }


}