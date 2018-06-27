<?php

namespace App\Controller\backendUser;

use App\Entity\User;
use App\Entity\Question;
use App\Entity\Answer;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\QuestionRepository;
use App\Repository\AnswerRepository;
use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @Route("/user/{id}", name="backendUser_profile")
     */
    public function profile(Request $request, User $user, QuestionRepository $questionRepo)
    {

        $questions = $user->getQuestions();
        $answers = $user->getAnswers();
        return $this->render('backendUser/user/profile.html.twig', array(
            'title' => 'Mon Profil',
            'user' => $user,
            'questions' => $questions,
            'answers' => $answers
        ));
    }

    /**
     * @Route("/user/{id}/edit", name="backendUser_profile_edit", methods="GET|POST")
     */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $encoder): Response
    {

        $currentPassword = $user->getPassword();
        $user->setPassword('');

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if(empty($user->getPassword())) {

                $user->setPassword($currentPassword);
            } else {

                $encoded = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($encoded);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('backendUser_profile', ['id' => $user->getId()]);
        }

        return $this->render('backendUser/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'title' => 'modifier mon profil'
        ]);
    }
}
