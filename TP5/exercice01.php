<?php
class BaseClass
{
    public function __construct()
    {
        print "In BaseClass constructor\n";
    }
}

class SubClass extends BaseClass
{
    public function __construct()
    {
        parent::__construct();
        print "In SubClass constructor\n";
    }
}

new SubClass();
