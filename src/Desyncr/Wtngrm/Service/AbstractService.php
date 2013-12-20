<?php
namespace Desyncr\Wtngrm\Service;
use \Desyncr\Wtngrm\Job\BaseJob;

abstract class AbstractService implements ServiceInterface {
    protected $jobs = array();

    public function setOptions($options) {
        foreach ($options as $k => $v) {
            $this->$k = $v;
        }
    }

    public function getOption($option) {
        if (isset($this->$option)) {
            return $this->$option;
        }
    }

    public function add($key, $job) {

        if (!is_object($job)) {
            $job = new BaseJob($job);
        }
        $job->setId($key);

        if (!$job instanceOf \Desyncr\Wtngrm\Job\JobInterface) {
            throw new \Exception('Job must implement JobInterface');
        }

        $this->jobs[] = $job;
    }
}
