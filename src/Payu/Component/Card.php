<?php

namespace Payu\Component;

class Card implements ComponentInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $cvv;

    /**
     * @var string
     */
    private $owner;

    /**
     * @param int $cvv
     *
     * @return $this
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * @return int
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param int $month
     *
     * @return $this
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param string $owner
     *
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $number
     * @param int    $cvv
     * @param int    $month
     * @param int    $year
     * @param int    $owner
     */
    public function __construct($number = null, $cvv = null, $month = null, $year = null, $owner = null)
    {
        $this->setNumber($number);
        $this->setCvv($cvv);
        $this->setMonth($month);
        $this->setYear($year);
        $this->setOwner($owner);
    }
}
