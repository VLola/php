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
        echo '<div class="div__product">';
        echo '<img class="img__product" src="'.$this->product->getImage().'">';
        echo '</img>';
        echo '<div class="div__product-title">';
        echo  $this->product->getTitle();
        echo '</div>';
        echo '<div class="div__product-description">';
        echo  $this->product->getDescription();
        echo '</div>';
        echo '<div class="div__product-price">';
        echo  ''.$this->product->getPrice().' грн.';
        echo '</div>';
        echo '<button>Купить</button>';
        echo '</div>';
    }
    public function showChangeProduct()
    {
        echo '<div class="div__product change-product">';
        echo '<form method="post" action="../views/redirect.php">';
        echo '<label for="title">Title:</label>';
        echo '<textarea name="title">';
        echo  $this->product->getTitle();
        echo '</textarea>';
        echo '<label for="description">Description:</label>';
        echo '<textarea name="description">';
        echo  $this->product->getDescription();
        echo '</textarea>';
        echo '<label for="image">Image url:</label>';
        echo '<textarea name="image">';
        echo  $this->product->getImage();
        echo '</textarea>';
        echo '<label for="price">Price:</label>';
        echo '<input name="price" value="'.$this->product->getPrice().'">';
        echo '</input>';
        echo '<button type="submit" name="save" value="'.$this->product->getId().'">Save</buttontype>';
        echo '<button type="submit" name="delete" value="'.$this->product->getId().'">Delete</buttontype>';
        echo '</form>';
        echo '</div>';
    }
}