<?php

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class SamplePageController
{
    /**
     * @Method("GET")
     * @Route("/sample")
     */
    public function testMethod()
    {
        return ['name' => 'EC-CUBE'];
    }
}