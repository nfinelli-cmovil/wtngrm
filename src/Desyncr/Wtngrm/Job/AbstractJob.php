<?php
namespace Desyncr\Wtngrm\Job;

abstract class AbstractJob implements JobInterface {
    protected $id = null;

    public function __construct(Array $arr = null) {
        if (is_null($arr)) return;

        foreach($arr as $k => $v) {
            $this->set($k, $v);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function serialize() {
        return json_encode(get_object_vars($this));
    }

    public function set($k, $v) {
        $this->$k = $v;
    }

    public function get($k) {
        return isset($this->$k) ? $this->$k : null;
    }
}
