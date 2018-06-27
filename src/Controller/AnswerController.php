<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Form\AnswerType;
use App\Form\ValidateType;
use App\Repository\UserRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnswerController extends Controller
{
    /**
     * @Route("user/answer/{id}", name="backendUser_answer", methods="POST")
     */
    public function answer(Request $request,UserRepository $userRepo,QuestionRepository $questionRepo, Question $question): Response
    {
      $newAnswer = new Answer();
      $form = $this->createForm(AnswerType::class, $newAnswer);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

         $newAnswer->setBlocked(0);
         $newAnswer->setValidated(0);
         $newAnswer->setUser($userRepo->find($this->getUser()));
         $newAnswer->setQuestion($question);

         $em = $this->getDoctrine()->getManager();
         $em->persist($newAnswer);
         $em->flush();

         return $this->redirectToRoute('question_show',[
           'id' => $question->getId(),
         ]);
      }

      return $this->render('backendUser/answer/_answer.html.twig', [
          'answerForm' => $form->createView(),
          'newAnswer' => $newAnswer
      ]);
  }

}
