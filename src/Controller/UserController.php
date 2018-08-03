<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Role;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Service\MessageGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
            'title' => 'Connexion'
        ));
    }

    /**
     * @Route("/signup", name="signup", methods="GET|POST")
     */
    public function signup(Request $request, UserPasswordEncoderInterface $encoder, RoleRepository $roleRepo): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On encode le passe
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            // $role = $user->getRole;
            // if ($role !== null){
            $user->setRole($roleRepo->findOneByRolename('ROLE_USER'));
            // }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('user/signup.html.twig', [
            'title' => 'Inscription',
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
