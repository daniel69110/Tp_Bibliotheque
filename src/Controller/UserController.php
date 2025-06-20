<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/', name: 'app_user')]
    public function index(EntityManagerInterface $em): Response
    {
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

#[Route('/user/new', name: 'app_user_new')]
public function new(Request $request, EntityManagerInterface $em): Response
{
$user = new User();
$form = $this->createForm(UserTypeForm::class, $user);

$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$em->persist($user);
$em->flush();

return $this->redirectToRoute('app_user');
}

return $this->render('user/new.html.twig', [
'form' => $form->createView(),
]);
}
}
