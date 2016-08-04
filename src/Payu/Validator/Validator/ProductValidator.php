<?php

namespace Payu\Validator\Validator;

use Payu\Component\Product;
use Payu\Exception\ValidationError;

class ProductValidator extends ValidatorAbstract
{
    /**
     * @var \Payu\Component\Product
     */
    private $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    protected function validateObject()
    {
        if (!$this->product || !$this->product instanceof Product) {
            throw new ValidationError('Basket items must be instance of Product');
        }
    }
}
