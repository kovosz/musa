<?php
// src/Controller/Assessment.php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class TeamController extends Controller
{
    /**
     * @param Request $request
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request, SessionInterface $session)
    {
        // just setup a fresh $team object (remove the dummy data)
        $team = new Team();

        $form = $this->createForm(TeamType::class, $team);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$team` variable has also been updated
            $team = $form->getData();

            $session->set('team', $team);
            // ... perform some action, such as saving the team to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($team);
            // $entityManager->flush();

            return $this->redirectToRoute('app_team_success');
        }

        return $this->render('team/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function success(SessionInterface $session)
    {
        $team = $session->get('team');
        return $this->render('team/success.html.twig', array(
            'team' => $team,
        ));
    }
}