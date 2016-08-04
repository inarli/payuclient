<?php

namespace Payu\Component;

class Basket implements ComponentInterface, \Iterator, \Countable
{
    /**
     * @var \SplObjectStorage
     */
    private $collection;

    public function __construct()
    {
        $this->collection = [];
    }

    /**
     * Add new product to basket.
     *
     * @param Product $product
     */
    public function add(Product $product)
    {
        $this->collection[$product->getCode()] = $product;
    }

    /**
     * Remove product from basket with code.
     *
     * @param string $code
     */
    public function remove($code)
    {
        unset($this->collection[$code]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element.
     *
     * @link http://php.net/manual/en/iterator.current.php
     *
     * @return mixed Can return any type.
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element.
     *
     * @link http://php.net/manual/en/iterator.next.php
     *
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        return next($this->collection);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element.
     *
     * @link http://php.net/manual/en/iterator.key.php
     *
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid.
     *
     * @link http://php.net/manual/en/iterator.valid.php
     *
     * @return bool The return value will be casted to boolean and then evaluated.
     *              Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset($this->collection[$this->key()]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element.
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     *
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        return reset($this->collection);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object.
     *
     * @link http://php.net/manual/en/countable.count.php
     *
     * @return int The custom count as an integer.
     *             </p>
     *             <p>
     *             The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * Return Total Price of Basket.
     *
     * @return float
     */
    public function getTotalPrice()
    {
        $sum = 0.0;
        /** @var $product \Payu\Component\Product */
        foreach ($this->collection as $product) {
            $sum += ((int) $product->getQuantity() * (float) $product->getPrice());
        }

        return $sum;
    }
}
