<?php

namespace Symfony\Cmf\Bundle\RoutingBundle\Tests\Form\Type;

use Symfony\Cmf\Bundle\RoutingBundle\Form\Type\RouteTypeType;

class RouteTypeTypeTest extends \PHPUnit_Framework_Testcase
{
    public function setUp()
    {
        $this->type = new RouteTypeType;
        $this->ori = $this->getMock(
            'Symfony\Component\OptionsResolver\OptionsResolverInterface');
    }

    public function testDefaultsSet()
    {
        $this->type->addRouteType('foobar');
        $this->type->addRouteType('barfoo');

        $this->ori->expects($this->once())
            ->method('setDefaults')
            ->with(array(
                'choices' => array(
                    'foobar' => 'route_type.foobar',
                    'barfoo' => 'route_type.barfoo',
                ),
                'translation_domain' => 'SymfonyCmfRoutingBundle',
            ));

        $this->type->setDefaultOptions($this->ori);
    }
}

