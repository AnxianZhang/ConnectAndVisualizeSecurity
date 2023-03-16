<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\Contact;
use App\Entity\AddContactTask;
use App\Form\AddContactType;
use App\Repository\ContactRepository;
use App\Repository\UtilisateurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    #[Route('/user/contact', name: 'show_contact')]
    public function index(ContactRepository $contactRepo): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');

        $user = $this->getUser();
        
        $userId = $user->getId();

        $contacts = $contactRepo->findContactsInfoById($userId);

        return $this->render('contact/index.html.twig', [
            'user' => $user,
            'contacts' => $contacts,
        ]);
    }

    #[Route('user/contact/addcontact', name: 'add_contact')]
    public function addContact(Request $request, ManagerRegistry $doctrine, UtilisateurRepository $userRepo, ContactRepository $contactRepo): Response{
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');

        $new = new Utilisateur();

        $user = $this->getUser();
        
        $connectedUserId =  $user->getId();

        $form = $this->createForm(AddContactType::class, $new);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formDatas = $form->getData();
            $contactValide = $userRepo // l'utilisateur correspondant au nom et au mot de passe fournis
                ->findOneBy([
                    'lname' => $formDatas->getLname(),
                    'fname' => $formDatas->getFname(),
                    'email' => $formDatas->getEmail(),
                ]);
            
            if (!$contactValide){
                return $this->render('contact/addContact.html.twig',[
                    'form' => $form->createView(),
                    'incorrect' => 'This person does not exists',
                ]);
            }
            $contactExiste = $contactRepo // l'utilisateur correspondant au nom et au mot de passe fournis
                ->findOneBy([
                    'idUser'=> $connectedUserId,
                    'idContact' => $contactValide->getId(),
                ]);

            if($contactExiste){
                return $this->render('contact/addContact.html.twig',[
                    'form' => $form->createView(),
                    'incorrect' => 'This person is already in your contacts',
                ]);
            }
            $entityManager = $doctrine->getManager();
            $contact= new Contact();
            $contact->setIdUser($connectedUserId)
                    ->setIdContact($contactValide->getId());
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('show_contact');
        }
        return $this->render('contact/addContact.html.twig', [
            // 'controller_name' => 'AddContactController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('user/contact/removecontact/{contactId}', name: 'remove_contact')]
    public function removeContact($contactId, ContactRepository $contactRepo): Response{
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');

        $contact = $contactRepo
            ->findOneBy(
            ['idContact' => $contactId],
        );
        $contactRepo->remove($contact, true);
        return $this->redirectToRoute('show_contact');
    }
}
