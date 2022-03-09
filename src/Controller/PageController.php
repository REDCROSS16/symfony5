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
#                Алгоритм:
#                1.пройтись по всем целым числам
#                2.найти их все делители
#                3.делители возвести в квадрат
#                4.сумма делителей
#                5. если есть корень то подходит!!!
    public function listSquared(): Response
    {
        $result = '';
        $m = 1;
        $n = 250;
//        1, 246, 2, 123, 3, 82, 6, 41

        if ($m > $n)  {
            $res = 'm больше n';
        } else {
            // например 42 или 246 где сумма квадратов делителей имеет целый корень
            $divisors = [];
            for ($num = $m; $num <= $n; $num++) {
//                echo 'Делители числа ' . $num . ': ';
                $divisors[$num] = [];
                for ($i = 1; $i <= $num ; $i++) {
                    if ($num % $i == 0) {
                        // число $num
                        $divisors[$num][] = $i;
//                        echo $i . ' ';
                    }
                }
//                echo '<br>';

                $quadDivisors[$num] = [];
                foreach ( $divisors[$num] as $divisor) {
                    $quadDivisors[$num][] = $divisor ** 2;
                }
                $quadDivisorsSum[$num] = array_sum($quadDivisors[$num]);
            }

            foreach ($quadDivisorsSum as $num => $value) {
                $sqrt = sqrt($value);
                $mult = (int)$sqrt * (int)$sqrt;

                if ($mult == $value) {
                    $result .= 'число ' . $num . ' имеет красивый квадрат ' . $value . ' ';
                }
            }
        }

        return $this->render('page/listsquared.html.twig', [
            'result' => $result,
        ]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction()
    {

       return $this->render('page/feedback.html.twig', [
        'name' => 'Alexander',
        'telephone' => '+375 33 382-20-11',
        'email' => 'belkill@mail.ru'
       ]);
    }
}
