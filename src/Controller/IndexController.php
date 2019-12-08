<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/")
 */
class IndexController extends AbstractController{
/**
 * @Route("/")
 */
public function index(){
    return new JsonResponse(['Action'=>"Hello Test Page",
        'time'=>time()
        ]);
    }
}