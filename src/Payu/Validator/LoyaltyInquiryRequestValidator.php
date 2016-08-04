<?php

namespace Payu\Validator;

class LoyaltyInquiryRequestValidator extends ValidatorAbstract
{
    private $validators = [
        '\\Payu\\Validator\\Validator\\CardValidator',
    ];

    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    public function validate()
    {
        foreach ($this->validators as $class) {
            /** @var $instance \Payu\Validator\Validator\ValidatorAbstract */
            $instance = new $class($this->request);
            $instance->validate();
            unset($instance);
        }
    }
}
