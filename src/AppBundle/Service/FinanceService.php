<?php

namespace AppBundle\Service;

use AppBundle\Repository\FinanceRepository;
use AppBundle\OutputFormatter\OutputFormatterInterface;

class FinanceService
{
    protected $repo;
    protected $formatter;

    public function __construct(FinanceRepository $repo, OutputFormatterInterface $formatter)
    {
        $this->repo = $repo;
        $this->formatter = $formatter;
    }

    public function getReport($start, $end, $filters, $reportType)
    {
        $output = null;
        //convert $filters to string - for easy to demo
        $filters = json_encode($filters);
        //db query based on $start, $end, $filters
        $report = $this->repo->queryDB($start, $end, $filters);
        //generate ouput
        $output = $this->formatter->output($report);

        return $output;
    }
}
