<?php

namespace Payu\Validator\Validator;

use Payu\Component\Basket;
use Payu\Exception\ValidationError;

class BasketValidator extends ValidatorAbstract
{
    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    protected function validateObject()
    {
        $object = $this->request->getBasket();
        if (!$object || !$object instanceof Basket) {
            throw new ValidationError('Basket is not set.');
        }
    }

    private function validateProducts()
    {
        /**
         * @var \Payu\Component\Basket
         */
        $collection = $this->request->getBasket();
        if (!$collection->count()) {
            throw new ValidationError('Basket does not be empty.');
        }

        /** @var $product \Payu\Component\Product */
        foreach ($collection as $product) {
            $validator = new ProductValidator($product);
            $validator->validate();
            unset($validator);
        }
    }

    public function validate()
    {
        parent::validate();
        $this->validateProducts();
    }
}
