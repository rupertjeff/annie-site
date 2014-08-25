<?php

namespace spec\AnnieDigital\Support;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AnnieDigital\Support\Repository');
    }
}
