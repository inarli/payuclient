<?php

namespace Payu\Validator\Validator;

use Payu\Component\Billing;
use Payu\Exception\ValidationError;

class BillingValidator extends ValidatorAbstract
{
    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    protected function validateObject()
    {
        /**
         * @var \Payu\Component\Billing
         */
        $object = $this->request->getBilling();
        if (!$object || !$object instanceof Billing) {
            throw new ValidationError('Billing information does not be empty.');
        }
    }
}
