<?php

class SpyAppRequest extends \Tdd\AppRequest
{

    public $getParamCallCount = 0;

    public function getParam($name, $default=NULL) {
        $this->getParamCallCount++;
        return parent::getParam($name, $default);
    }
}
