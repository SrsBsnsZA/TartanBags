<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactType
 *
 * @author CollenNkabinde
 */
class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Your Name'],
        ]);
        $builder->add('email', EmailType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Email Address'],
        ]);
        $builder->add('subject', TextType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Subject'],
        ]);
        $builder->add('body', TextareaType::class, [
            'attr' => ['class' => 'form-control', 'placeholder' => 'Your Message'],
        ]);
    }

    public function getBlockPrefix() {
        return 'contact';
    }

}
