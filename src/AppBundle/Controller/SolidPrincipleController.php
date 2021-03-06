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
use AppBundle\InterfacePrinciple\Captain;
use AppBundle\InterfacePrinciple\HumanWorker;
use AppBundle\InterfacePrinciple\AndroidWorker;
use AppBundle\LiskovSubstitution\FooService;
use AppBundle\LiskovSubstitution\BaseClassA;
use AppBundle\LiskovSubstitution\ExtendBaseClassA;

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

        return new Response('area '.$area);
    }

    /**
     * @Route("/solid/ip",name="solid_ip")
     */
    public function interfacePrincipleAction(Request $request)
    {
        $output = '';

        $captain = new Captain();

        $humanWorker = new HumanWorker();
        $output .= $captain->manage($humanWorker);

        $androidWorker = new AndroidWorker();
        $output .= $captain->manage($androidWorker);

        return new Response($output);
    }
    /**
     * @Route("/solid/liskov", name="solid_liskov")	
     */
    public function liskovSubstitutionAction(Request $request)
    {
        $fooService1 = new FooService(new BaseClassA());
        $fooService2 = new FooService(new ExtendBaseClassA());

        $output1 = $fooService1->doSomeThing();
        $output2 = $fooService2->doSomeThing();

        return new Response($output1.' | '.$output2);
    }
}
