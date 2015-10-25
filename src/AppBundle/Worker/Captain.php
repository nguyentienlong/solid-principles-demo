<?php
namespace AppBundle\Worker;

interface WorkerInterface
{
    public function work();
    public function sleep();
}

class HumanWorker implements WorkerInterface
{
    public function work()
    {
        return  get_class($this) . ' '. __FUNCTION__ . ' ';
    }

    public function sleep()
    {
        return  get_class($this) . ' '. __FUNCTION__ . ' ';
    }
}

class AndroidWorker implements WorkerInterface
{
    public function work()
    {
        return  get_class($this) . ' '. __FUNCTION__ . ' ';
    }
    public function sleep()
    {
        return null;
    }
}

class Captain
{
    public function manage(WorkerInterface $worker)
    {
        $log = '';
        $log.=$worker->work();
        $log.=$worker->sleep();
        return $log;
    }
}
