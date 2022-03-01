<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/page", name="app_page")
     */
    public function index(): Response
    {
        $name = $this->generateName(7);
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
            'user_name'       => $name,
            'age'             => '29'
        ]);
    }

    private function generateName($len = 5) {
        $arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'k', 'l', 'm', 'o', 'p'];
        $name = '';
        for ($i = 0; $i < $len; $i++) {
            $name .= $arr[mt_rand(0,count($arr) - 1)];
        }

        return $name;
    }
}
