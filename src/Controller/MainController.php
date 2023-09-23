<?php

namespace App\Controller;

use App\Entity\Noticia;
use App\Form\NoticiaType;
use App\Repository\NoticiaRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(NoticiaRepository $nr): Response
    {
        $noticias = $nr->findReverse();
        return $this->render('main/index.html.twig', ["noticias"=>$noticias]);
    }

    #[Route("/nova", name: 'nova_noticia')]
    public function nova_noticia(Request $request, EntityManagerInterface $em): Response
    {
        $noticia = new Noticia();
        $form = $this->createForm(NoticiaType::class, $noticia);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $noticia = $form->getData();
            $noticia->setData(new DateTime());

            $em->persist($noticia);
            $em->flush();

            return new Response("Notícia adicionada com sucesso");
        }
        return $this->render("main/nova_noticia.html.twig", ["form" => $form]);

        /*
        form = Noticia()
        if form.validate_on_submit():
            noticia = # pega as coisas do form
            db.session.add(noticia)
            db.session.commit()
            return render_template("sucesso.html")
        return render_template("nova_noticia.html")
        */
    }

    #[Route("/noticia/{id}", name: "noticia")]
    public function noticia(int $id, NoticiaRepository $nr): Response
    {
        $noticia = $nr->find($id);
        return $this->render("main/noticia.html.twig", ["noticia" => $noticia]);
    }
}
