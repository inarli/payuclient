<?php

namespace Payu\Validator\Validator;

use Payu\Component\Card;
use Payu\Exception\ValidationError;

class CardValidator extends ValidatorAbstract
{
    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    protected function validateObject()
    {
        /**
         * @var \Payu\Component\Card
         */
        $object = $this->request->getCard();
        if (!$object || !$object instanceof Card) {
            throw new ValidationError('Card number does not be empty.');
        }
    }

    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    private function validateLuhn()
    {
        /**
         * @var \Payu\Component\Card
         */
        $card = $this->request->getCard();

        $sum = 0;
        $weight = 2;
        $number = $card->getNumber();
        $length = strlen($number);

        for ($i = $length - 2; $i >= 0; $i--) {
            $digit = $weight * $number[$i];
            $sum += floor($digit / 10) + $digit % 10;
            $weight = $weight % 2 + 1;
        }

        if ((10 - $sum % 10) % 10 != $number[$length - 1]) {
            throw new ValidationError('Bad card number.');
        }
    }

    private function validateExpireDate()
    {
        /**
         * @var \Payu\Component\Card
         */
        $card = $this->request->getCard();
        $cardExpireTime = strtotime(
            date('Y-m-t', strtotime(sprintf('%d-%02d-1', $card->getYear(), $card->getMonth()))
        ));

        if (strtotime(date('Y-m-d')) > $cardExpireTime) {
            throw new ValidationError('Card is expired');
        }
    }

    /**
     * @throws \Payu\Exception\ValidationError
     *
     * @return void
     */
    public function validate()
    {
        parent::validate();
        $this->validateLuhn();
        $this->validateExpireDate();
    }
}
