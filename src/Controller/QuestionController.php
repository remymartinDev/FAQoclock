<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Form\AnswerType;
use App\Form\ValidateType;
use App\Repository\QuestionRepository;
use App\Repository\UserRepository;
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
    public function home(QuestionRepository $questionRepo,Request $request, AuthenticationUtils $authenticationUtils)
    {
        $questions = $questionRepo->findAll();
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('base.html.twig', [
          'title' => 'FAQ O\'clock',
          'questions' => $questions,
        ]);
    }

    /**
     * @Route("/question/show/{id}", name="question_show", methods="GET|POST")
     */
    public function show(Request $request, Question $question)
    {
        //parceque le form "_answer" est include dans cette page
        $answerForm = $this->createForm(AnswerType::class);
        $validateForm = $this->createForm(ValidateType::class);

        $answers = $question->getAnswers();
        $tags = $question->getTags();

        return $this->render('question/show.html.twig', [
            'title' => 'Question',
            'question' => $question,
            'answers' => $answers,
            'tags' => $tags,
            'answerForm' => $answerForm->createView(),
            'validateForm' => $validateForm->createView(),
        ]);
    }

    /**
     * @Route("/create", name="backendUser_create", methods="GET|POST")
     */
     public function create(Request $request, UserRepository $userRepo): Response
     {
         $newQuestion = new Question();
         $form = $this->createForm(QuestionType::class, $newQuestion);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
            $newQuestion->setBlocked(0);

            $newQuestion->setUser($userRepo->find($this->getUser()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($newQuestion);
            $em->flush();

            return $this->redirectToRoute('question_show',[
              'id'=>$newQuestion->getId(),
            ]);
         }

         return $this->render('backendUser/question/new.html.twig', [
            'title' => 'Poser une question',
            'questionForm' => $form->createView(),
            'newQuestion' => $newQuestion,
         ]);
     }
}
