<?php

class Purchase
{
    protected $id;
    protected $productId;
    protected $count;
    protected $phone;
    public function __construct($id, $productId, $count, $phone)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->count = $count;
        $this->phone = $phone;
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
    public function getPhone()
    {
        return $this->phone;
    }

}