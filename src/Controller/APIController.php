<?php

namespace App\Controller;

use App\Repository\NoticiaRepository;
use App\Entity\Clima;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class APIController extends AbstractController
{
    #[Route('/api/busca', name: 'api_busca')]
    public function index(Request $req, NoticiaRepository $nr): Response
    {
        $q = $req->get("q");
        $noticias = $nr->findNoticia($q);
        
        return $this->json($noticias, 200, ["Content-Type" => 'application/json;charset=UTF-8']);
    }

    #[Route('/api/clima', name: "api_clima")]
    public function api_clima(HttpClientInterface $client, EntityManagerInterface $em): Response
    {
        $response = $client->request("GET", "https://api.openweathermap.org/data/2.5/weather?q=Ouagadougou&appid=636f94aa0dac73361e2d50043ebf47d9&units=metric");
        $conteudo = $response->toArray();
        $clima = new Clima();
        $clima->setWeatherName($conteudo['weather'][0]['main']);
        $clima->setWeatherDescription($conteudo['weather'][0]['description']);
        $clima->setTemperature($conteudo["main"]['temp']);
        $clima->setFeelsLike($conteudo['main']['feels_like']);
        $clima->setPressure($conteudo['main']['pressure']);
        $clima->setHumidity($conteudo['main']['humidity']);
        $clima->setWindSpeed($conteudo['wind']['speed']);

        $em->persist($clima);
        $em->flush();

        return new Response("ok");
    }
}
