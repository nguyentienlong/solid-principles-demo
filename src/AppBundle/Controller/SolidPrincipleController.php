<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Service\FinanceService;
use Carbon\Carbon;

class SolidPrincipleController extends Controller
{
    /**
    * @Route("/solid/s", name="solid_s")
    */
    public function singleAction(Request $request){
        $financeService =  $this->get('finance_service');
        //dumpy start, end, filters and reportType
        $start = Carbon::now()->subWeek();
        $end = Carbon::now();
        $filters = ['amount'=>'>1000'];
        $reportType = 'html';
        $financeReport = $financeService->getReport($start, $end, $filters, $reportType);
        return new Response($financeReport);
    }
}
