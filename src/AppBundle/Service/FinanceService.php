<?php

namespace AppBundle\Service;

class FinanceService
{
    public function __construct()
    {
    }

    public function getReport($start, $end, $filters, $reportType)
    {
        $output = null;
        //convert $filters to string - for easy to demo
        $filters = json_encode($filters);
        //db query based on $start, $end, $filters
        $report = $this->queryDB($start, $end, $filters);
        //generate ouput
        if ('json' === $reportType) {
            $output = $this->outPutHtml($report);
        } elseif ('html' === $reportType) {
            $output = $this->outPutJson($report);
        } else {
            $output = $this->outPutToPlainText($report);
        }

        return $output;
    }

    protected function outPutHtml($report)
    {
        return __FUNCTION__.' output html with '.$report;
    }

    protected function outPutJson($report)
    {
        return __FUNCTION__.' output json with '.$report;
    }

    protected function queryDB($start, $end, $filters)
    {
        return __FUNCTION__.' query db with '.$start.' '.$end.' '.$filters;
    }

    protected function outPutToPlainText($report)
    {
        return __FUNCTION__.' output to plain text '.$report;
    }
}
