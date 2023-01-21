<?php

class PurchaseController
{
    protected $purchase;

    /**
     * @return mixed
     */
    public function setPurchase($id, $email, $productId, $count, $price, $status)
    {
        $this->purchase = new Purchase($id, $email, $productId, $count, $price, $status);
    }

    /**
     * @return mixed
     */
    public function getPurchase()
    {
        echo '<tr>';
        echo '<td>'.$this->purchase->getId().'</td>';
        echo '<td>'.$this->purchase->getEmail().'</td>';
        echo '<td>'.$this->purchase->getProductId().'</td>';
        echo '<td>'.$this->purchase->getCount().'</td>';
        echo '<td>'.$this->purchase->getPrice().'</td>';
        echo '<td>'.$this->purchase->getCount() * $this->purchase->getPrice().'</td>';
        echo '<td><input type="text" class="form-control" name="status'.$this->purchase->getId().'" style="font-size: 12px" value="'.$this->purchase->getStatus().'"></td>';
        echo '<td><button class="btn btn-outline-secondary btn-sm" type="submit" name="changePurchase" value="'.$this->purchase->getId().'">Change</button></td>';
        echo '<td><button class="btn btn-outline-secondary btn-sm" type="submit" name="deletePurchase" value="'.$this->purchase->getId().'">Delete</button></td>';
        echo '</tr>';
    }
}