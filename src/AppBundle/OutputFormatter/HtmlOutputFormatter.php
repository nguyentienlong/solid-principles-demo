<?php
namespace AppBundle\OutputFormatter;

class HtmlOutputFormatter implements OutputFormatterInterface
{
    public function output($report)
    {
        return __FUNCTION__.' output html with '. $report;
    }
}
