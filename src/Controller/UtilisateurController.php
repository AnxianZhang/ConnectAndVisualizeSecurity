<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use App\Security\UserAuthenticator;
use App\Entity\ContactUsTask;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use App\Form\ContactUsType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;

class UtilisateurController extends AbstractController
{
    #[Route(path: '/', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error
        ]);
    }

    #[Route(path: '/user/logout', name: 'app_logout')]
    public function logout(): Response
    {
        // $logout->logout();

        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
        return $this->redirectToRoute('login');
    }

    #[Route('/user/register', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UserAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            //ajout de roles
            $user->setRoles($user->getRoles());

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('user/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route(path: '/user/mailer', name: 'mailer')]
    public function userMailer(MailerInterface $mailer, SessionInterface $session, Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');

        $connectedUser = $this->getUser();

        $mailTask = new ContactUsTask();
        $form = $this->createForm(ContactUsType::class, $mailTask);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $formDatas = $form->getData();

            $email = (new Email())
                ->from($connectedUser->getEmail())
                ->to('gadanxianzhang2@gmail.com')
                ->subject($formDatas->getSubject())
                ->text($formDatas->getText())
                ->html('<p>See Twig integration for better HTML integration!</p>');

                
            $mailer->send($email);
        }

        return $this->render('user/mailer.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}