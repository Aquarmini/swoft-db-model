# swoft-trait-instance
基于Swoft的协程单例扩展

[![Build Status](https://travis-ci.org/limingxinleo/swoft-trait-instance.svg?branch=master)](https://travis-ci.org/limingxinleo/swoft-trait-instance)

## 单例模式Trait
~~~php
<?php
use Xin\Swoft\Traits\InstanceTrait;

class Incr
{
    use InstanceTrait;

    public $incr = 0;

    public function incr()
    {
        return ++$this->incr;
    }

    public function get()
    {
        return $this->incr;
    }
}

echo Incr::getInstance()->incr(); // 1
go(function(){
    echo Incr::getInstance()->incr(); // 1
});
~~~
