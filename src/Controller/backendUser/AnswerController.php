<?php

namespace App\Controller\backendUser;

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
       * @Route("user/answer/validate/{id}", name="backendUser_answer_validate", methods="POST")
       */
      public function validate(Request $request, Answer $answer): Response
      {

        $form = $this->createForm(ValidateType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $answer->setValidated(1);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_show',[
             'id' => $answer->getQuestion()->getId(),
            ]);
        }

        return $this->render('backendUser/answer/_validate.html.twig', [
          'validateForm' => $form->createView(),
          'answer' => $answer

        ]);
    }
    /**
     * @Route("user/answer/invalidate/{id}", name="backendUser_answer_invalidate", methods="POST")
     */
    public function invalidate(Request $request, Answer $answer): Response
    {

      $form = $this->createForm(ValidateType::class, $answer);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

          $answer->setValidated(0);
          $this->getDoctrine()->getManager()->flush();

          return $this->redirectToRoute('question_show',[
           'id' => $answer->getQuestion()->getId(),
          ]);
      }

      return $this->render('backendUser/answer/_invalidate.html.twig', [
        'validateForm' => $form->createView(),
        'answer' => $answer

      ]);
  }

}
