<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function home(QuestionRepository $questionRepository,Request $request, AuthenticationUtils $authenticationUtils)
    {
        $questions = $questionRepository->findAll();
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        

        return $this->render('base.html.twig', [
          'title' => 'FAQ O\'Clock',
          'questions' => $questions,
          'last_username' => $lastUsername,
          'error'         => $error,
        ]);
    }

    /**
     * @Route("/question/{id}", name="question_show", methods="GET")
     */
    public function show(Question $question)
    {


        $answers = $question->getAnswers();

        return $this->render('question/show.html.twig', [
            'title' => 'Question',
            'question' => $question,
            'answers' => $answers
        ]);
    }
}
