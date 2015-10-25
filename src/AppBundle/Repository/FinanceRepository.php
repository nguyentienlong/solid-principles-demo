<?php

namespace AppBundle\Repository;

class FinanceRepository
{
    public function queryDB($start, $end, $filters)
    {
        return __FUNCTION__.' query db with '.$start.' '.$end.' '.$filters;
    }
}
