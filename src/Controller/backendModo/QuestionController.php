<?php

namespace App\Controller\backendModo;

use App\Entity\Answer;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Form\AnswerType;
use App\Form\BlockType;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use App\Repository\UserRepository;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionController extends Controller
{
/**
 * @Route("backendModo/question/block/{id}", name="backendModo_question_block", methods="POST")
 */
public function block(Request $request, Question $question): Response
{

  $form = $this->createForm(BlockType::class, $question);
  $form->handleRequest($request);

  if ($form->isSubmitted() && $form->isValid()) {

      $question->setBlocked(1);
      $this->getDoctrine()->getManager()->flush();

      return $this->redirectToRoute('question_show',[
       'id' => $question->getId(),
      ]);
  }

  return $this->render('backendModo/question/_block.html.twig', [
    'blockForm' => $form->createView(),
    'question' => $question

  ]);
}

  /**
   * @Route("backendModo/question/unblock/{id}", name="backendModo_question_unblock", methods="POST")
   */
  public function unblock(Request $request, Question $question): Response
  {

    $form = $this->createForm(BlockType::class, $question);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $question->setBlocked(0);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('question_show',[
         'id' => $question->getId(),
        ]);
    }

    return $this->render('backendModo/question/_block.html.twig', [
      'blockForm' => $form->createView(),
      'question' => $question

    ]);
  }
}
