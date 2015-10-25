<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use AppBundle\Shape\Square;
use AppBundle\Shape\Circle;
use AppBundle\Shape\AreaCalculator;

class SolidPrincipleController extends Controller
{
    /**
     * @Route("/solid/s", name="solid_s")
     */
    public function singleAction(Request $request)
    {
        $financeService = $this->get('finance_service');
        //dumpy start, end, filters and reportType
        $start = Carbon::now()->subWeek();
        $end = Carbon::now();
        $filters = ['amount' => '>1000'];
        $reportType = 'html';
        $financeReport = $financeService->getReport($start, $end, $filters, $reportType);

        return new Response($financeReport);
    }
    /**
     * @Route("/solid/oc", name="solid_oc")
     */
    public function openClosePrincipleAction(Request $request)
    {
        $shapes = [
            new Square(5, 10),
            new Circle(5),
        ];
        $calculator = new AreaCalculator();
        //we can move area calculator to services.yml
        $area = $calculator->calculate($shapes);

        return new Response('area ' . $area);
    }
}
