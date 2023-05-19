<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Psr\Cache\CacheItemInterface;





class LibreriaAbiertaController extends AbstractController {


    /**
     * Función homepage(): carga la web desde la ruta /
     * Nombre de la ruta: homepage.
     * */
    #[Route('/', name: 'homepage')]
    public function homepage() {
        //Parámetros a pasar como array:
        $catalogoVideos = [
            "Vídeo 1" => "Película de 1989 en la que unos niños juegan junto unas vías del tren",
            "Vídeo 2" => "Película premiada en 2003",
            "Vídeo 3" => "Metraje descartado de los estudiantes de la escuela de cine"
        ];
        return $this->render('libreria/homepage.html.twig', 
        ['title' => 'Librería abierta', 'catalogo' => $catalogoVideos]
        );
    }
    /**
     * Función videoteca(): carga la sección videoteca desde la ruta /video
     * Nombre de la ruta: videoteca.
     * 
     * */
    #[Route('/video/{slug}', name: 'videoteca')]
    public function videoteca(String $slug=null) {
        //Parámetros a pasar como array:
        $catalogoVideos = [
            "Vídeo 1" => "Película de 1989 en la que unos niños juegan junto unas vías del tren",
            "Vídeo 2" => "Película premiada en 2003",
            "Vídeo 3" => "Metraje descartado de los estudiantes de la escuela de cine"
        ];
        return $this->render('libreria/childVideoteca.html.twig', 
        ['title' => 'Librería abierta: videoteca', 'catalogo' => $catalogoVideos]
        );
    }
    /**
     * Función libreria(): carga la sección libreria desde la ruta /libreria
     * Nombre de la ruta: libreria.
     * */
    #[Route('/libros/{slug}', name: 'libreria')]
    public function libreria(String $slug=null) {
        return $this->render('libreria/childLibreria.html.twig', 
        ['title' => 'Libreria abierta: librería']
        );
    }
    
        /**
     * Función listar(): prueba de json
     * Nombre de la ruta: listar.
     * */
    #[Route('/listar/{slug}', name: 'listar')]
    public function listar(HttpClientInterface $httpClient, CacheInterface $cache, string $slug = null): Response
    {
        /**
         * Guardo en una variable todos los datos del json.
         */
        //Ejercicio sin caché:
         //$response = $httpClient->request('GET', 'https://raw.githubusercontent.com/sabelassm/json-example/master/animals-1.json');
        //$animales = $response->toArray();
        //Con caché:

        $animales = $cache->get('animales_data', function(CacheItemInterface $cacheItem) use($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/sabelassm/json-example/master/animals-1.json');
            $cacheItem->expiresAfter(10);
            return $response->toArray();
        }
    );


        return $this->render('libreria/childListar.html.twig', 
        ['title' => 'Listar','animales' => $animales]
        
        );
    }
}


?>