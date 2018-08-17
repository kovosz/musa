<?php
// src/Controller/Assessment.php

namespace App\Controller;

use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AssessmentController extends Controller
{

    public function new(Request $request)
    {
        // just setup a fresh $team object (remove the dummy data)
        $team = new Team();

        $form = $this->createFormBuilder($team)
            ->add('name', TextType::class)
            ->add('releaseTrain', TextType::class)
            ->add('size', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Team'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$team` variable has also been updated
            $team = $form->getData();

            // ... perform some action, such as saving the team to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($team);
            // $entityManager->flush();

            return $this->redirectToRoute('team_success');
        }

        return $this->render('team/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}