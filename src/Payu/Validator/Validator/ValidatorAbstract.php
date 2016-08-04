<?php

namespace Payu\Validator\Validator;

use Payu\Request\RequestAbstract;

abstract class ValidatorAbstract
{
    /**
     * @var \Payu\Request\RequestAbstract
     */
    protected $request;

    /**
     * @param RequestAbstract $request
     */
    public function __construct(RequestAbstract $request)
    {
        $this->request = $request;
    }

    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    abstract protected function validateObject();

    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    public function validate()
    {
        $this->validateObject();
    }
}
