<?php

class Purchase
{
    protected $id;
    protected $email;
    protected $productId;
    protected $count;
    protected $price;
    protected $status;
    public function __construct($id, $email, $productId, $count, $price, $status)
    {
        $this->id = $id;
        $this->email = $email;
        $this->productId = $productId;
        $this->count = $count;
        $this->price = $price;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

}