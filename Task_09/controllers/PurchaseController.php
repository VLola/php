<?php

class PurchaseController
{
    protected $purchase;

    /**
     * @return mixed
     */
    public function setPurchase($id, $productId, $count, $phone)
    {
        $this->purchase = new Purchase($id, $productId, $count, $phone);
    }
}