<?php
namespace AppBundle\OutputFormatter;

class JsonOutputFormatter implements OutputFormatterInterface{
    public function output($report){
      return __FUNCTION__.' output json with ' . $report;
    }
}
