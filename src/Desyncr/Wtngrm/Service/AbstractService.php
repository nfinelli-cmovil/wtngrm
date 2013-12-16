<?php
namespace Desyncr\Wtngrm\Service;
use \Desyncr\Wtngrm\Job\AbstractJob;

abstract class AbstractService implements ServiceInterface {
    protected $jobs = array();

    public function setOptions($options) {
        foreach ($options as $k => $v) {
            $this->$k = $v;
        }
    }

    public function add($key, $job) {

        if (!is_object($job)) {
            $job = new AbstractJob($job);
        }
        $job->setId($key);

        if (!$job instanceOf \Desyncr\Wtngrm\Job\JobInterface) {
            throw new \Exception('Job must implement JobInterface');
        }

        $this->jobs[] = $job;
    }
}