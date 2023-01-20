<?php

class ProductController
{
    protected $product;

    /**
     * @return mixed
     */
    public function setProduct($id, $title, $description, $image, $price)
    {
        $this->product = new Product($id, $title, $description, $image, $price);
    }

    public function showProduct()
    {
        echo '<div class="card m-3 p-3" style="height: 30rem; width: 18rem;">';
        echo '<img class="card-img w-50 m-auto" src="'.$this->product->getImage().'">';
        echo '</img>';
        echo '<div class="card-body h-50">';
        echo '<h5 class="card-title h-25 overflow-hidden">';
        echo  $this->product->getTitle();
        echo '</h5>';
        echo '<div class="card-text h-50 overflow-hidden mb-1">';
        echo  $this->product->getDescription();
        echo '</div>';
        echo '<h4 class="card-text mt-auto">';
        echo  ''.$this->product->getPrice().' грн.';
        echo '</h4>';
        echo '<form method="get">';
        echo '<button class="btn btn-outline-secondary w-100" name="buy" type="submit" value="'.$this->product->getDescription().'">Купить</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    public function showChangeProduct()
    {
        echo '<div class="px-3 m-3 border" style="height: 30rem; width: 16rem;">';
        echo '<form class="d-flex flex-column" method="post" action="../views/redirect.php">';
        echo '<div class="form-group">';
        echo '<label for="title">Title:</label>';
        echo '<textarea class="form-control" name="title">';
        echo  $this->product->getTitle();
        echo '</textarea>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="description">Description:</label>';
        echo '<textarea class="form-control" name="description" rows="3">';
        echo  $this->product->getDescription();
        echo '</textarea>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="image">Image url:</label>';
        echo '<textarea class="form-control" name="image" rows="3">';
        echo  $this->product->getImage();
        echo '</textarea>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="price">Price:</label>';
        echo '<input  class="form-control" name="price" value="'.$this->product->getPrice().'">';
        echo '</div>';

        echo '<button class="btn btn-secondary mt-2" type="submit" name="save" value="'.$this->product->getId().'">Save</buttontype>';
        echo '<button class="btn btn-secondary mt-2" type="submit" name="delete" value="'.$this->product->getId().'">Delete</buttontype>';
        echo '</form>';
        echo '</div>';
    }
}