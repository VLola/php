<?php

class Product
{
    protected $id;
    protected $title;
    protected $description;
    protected $image;
    protected $price;
    protected $count;
    protected $fullPrice;
    public function __construct($id, $title, $description, $image, $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
    public function getPrice()
    {
        return $this->price;
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
    public function getFullPrice()
    {
        return $this->fullPrice;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count): void
    {
        $this->count = $count;
        $this->fullPrice = $count * $this->price;
    }

    /**
     * @param mixed $fullPrice
     */
    public function setFullPrice($fullPrice): void
    {
        $this->fullPrice = $fullPrice;
    }
}