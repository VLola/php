<?php

class BuyController
{
    protected $product;

    /**
     * @return mixed
     */
    public function setBuy($id, $title, $description, $image, $price)
    {
        $this->product = new Product($id, $title, $description, $image, $price);
        $this->product->setCount(1);
        $this->product->setFullPrice($this->product->getPrice());
    }

    public function showBuy()
    {
        $id = $this->product->getId();
        $name = "count$id";
        $countMinus = "countMinus$id";
        $countPlus = "countPlus$id";
        if(isset($_POST[$name])){
            $this->product->setCount($_POST[$name]);
        }
        if(isset($_POST[$countMinus])){
            if($this->product->getCount() > 1){
                $this->product->setCount($this->product->getCount() - 1);
            }
        }
        if(isset($_POST[$countPlus])){
            $this->product->setCount($this->product->getCount() + 1);
        }
        echo '<div class="card m-3 p-3" style="height: 24rem; width: 16rem;">';
        echo '<div class="position-absolute w-100 px-2">';
        echo '<button name="delete" class="btn btn-outline-light btn-close bg-light float-end me-4" value="'.$id.'" type="submit"></button>';
        echo '</div>';
        echo '<img class="card-img w-50 m-auto" src="'.$this->product->getImage().'">';
        echo '</img>';
        echo '<div class="card-body h-50">';
        echo '<h5 class="card-title h-25 overflow-hidden mt-3">';
        echo  $this->product->getTitle();
        echo '</h5>';
        echo '<div class="d-flex justify-content-between align-items-center mt-4">';
        echo '<button class="btn btn-outline-secondary py-0 w-25 my-3" name="countMinus'.$id.'" type="submit"><h4>-</h4></button>';
        echo '<input class="w-25" type="text" name="count'.$id.'" value="'.$this->product->getCount().'" readonly>';
        echo '<button class="btn btn-outline-secondary py-0 w-25 my-3" name="countPlus'.$id.'" type="submit"><h4>+</h4></button>';
        echo '</div>';
        echo '<h4 class="card-text mt-3">';
        echo  ''.$this->product->getFullPrice().' грн.';
        echo '</h4>';
        echo '</div>';
        echo '</div>';
    }
    /**
     * @return mixed
     */
    public function getFullPrice()
    {
        return $this->product->getFullPrice();
    }
    public function writeToDatabase($email){
        $conn = new mysqli("localhost", "root", "", "valik");
        if(!$conn->connect_error){
            $productId = $this->product->getId();
            $count = $this->product->getCount();
            $price =  $this->product->getPrice();
            $sql_code = 'INSERT INTO `purchases`(`email`, `productId`, `count`,`price`,`status` ) VALUES ( "'.$email.'","'.$productId.'" , "'.$count.'", "'.$price.'", "Оформление")';
            if($conn->query($sql_code)){
                $conn->close();
            }
            else{
                $conn->close();
            }
        }
    }
}