<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Shipping\Calculator;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Shipping\Model\ShipmentInterface;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class FlatRateCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Shipping\Calculator\FlatRateCalculator');
    }

    function it_should_implement_Sylius_shipping_calculator_interface()
    {
        $this->shouldImplement('Sylius\Component\Shipping\Calculator\CalculatorInterface');
    }

    function it_returns_flat_rate_type()
    {
        $this->getType()->shouldReturn('flat_rate');
    }

    function it_should_calculate_the_flat_rate_amount_configured_on_the_method(ShipmentInterface $shipment)
    {
        $this->calculate($shipment, array('amount' => 1500))->shouldReturn(1500);
    }

    function its_calculated_value_should_be_an_integer(ShipmentInterface $shipment)
    {
        $this->calculate($shipment, array('amount' => 410))->shouldBeInteger();
    }
}
