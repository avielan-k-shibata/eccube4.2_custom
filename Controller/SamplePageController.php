<?php

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Eccube\Controller\AbstractController;
use Eccube\Entity\Product;

class SamplePageController extends AbstractController
{
    /**
     * @Method("GET")
     * @Route("/sample")
     * @Template("Sample/index.twig")
     */
    public function testMethod()
    {
        $product = $this->entityManager->getRepository('Eccube\Entity\Product')->find(1);
        return [
            'name' => 'EC-CUBE',
            'product' => $product,

        ];
    }
    /**
     * @Method("GET")
     * @Route("/sample2")
     */
    public function testMethod2()
    {
        // dump(123);
        // return ['name' => 'EC-CUBE'];
        return $this->redirectToRoute('help_about');
    }

        /**
     * @Method("GET")
     * @Route("/sample/{id}", name="sample_id")
     * @Template("Sample/index.twig")
     * 
     */
    public function testMethod3($id)
    {
        return ['name' => $id];
    }
    /**
     * @Method("GET")
     * @Route("/%eccube_admin_route%/sample")
     */
    public function testMethod4()
    {
        return new Response('admin page');
    }
}