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

    // сумма их квадратных делителей сама по себе является квадратом
    public function listSquared($m, $n): Response
    {
        // все целые делители между $m и $n
        $devisors = [];

//        1, 246, 2, 123, 3, 82, 6, 41

        if ($m > $n)  {
            $res = 'm больше n';
        } else {
            for ($i = $m; $i < $n; $i++)
                if ($n % $i == 0 ) {
                    $devisors[] = $i;
                }
            $quad = [];
            foreach ($devisors as $devisor) {
                $quad[] = $devisor ** 2;
            }

            foreach ($quad as $index => $value) {

            }
        }

        return $this->render('page/listsquared.html.twig', [
            'result' => $res
        ]);
    }
}
