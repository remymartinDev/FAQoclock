<?php

namespace App\Controller\backendModo;

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
   * @Route("backenModo/answer/block/{id}", name="backendModo_answer_block", methods="POST")
   */
  public function block(Request $request, Answer $answer): Response
  {

    $form = $this->createForm(ValidateType::class, $answer);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $answer->setBlocked(1);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('question_show',[
         'id' => $answer->getQuestion()->getId(),
        ]);
    }

    return $this->render('backendModo/answer/_block.html.twig', [
      'blockForm' => $form->createView(),
      'answer' => $answer

    ]);
  }

    /**
     * @Route("backenModo/answer/unblock/{id}", name="backendModo_answer_unblock", methods="POST")
     */
    public function unblock(Request $request, Answer $answer): Response
    {

      $form = $this->createForm(ValidateType::class, $answer);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

          $answer->setBlocked(0);
          $this->getDoctrine()->getManager()->flush();

          return $this->redirectToRoute('question_show',[
           'id' => $answer->getQuestion()->getId(),
          ]);
      }

      return $this->render('backendModo/answer/_block.html.twig', [
        'blockForm' => $form->createView(),
        'answer' => $answer

      ]);
    }

}
