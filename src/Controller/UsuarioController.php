<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Bundle\SecurityBundle\Security;

#[Route('/usuario')]
class UsuarioController extends AbstractController
{
    #[Route('/', name: 'app_usuario')]
    public function index(): Response
    {
        return $this->render('usuario/index.html.twig');
    }

    #[Route('/premium', name: 'premium')]
    public function premium(Security $sec, EntityManagerInterface $em): Response
    {
        $user = $sec->getUser();
        $roles = $user->getRoles();
        if (count($roles) == 1) {
            $user->setRoles(array("ROLE_PREMIUM"));
            $em->persist(($user));
            $em->flush();
            
            return new Response("Parabéns, agora você é premium!");
        }
        return new Response("Você não é elegível para isto.");
    }
}
