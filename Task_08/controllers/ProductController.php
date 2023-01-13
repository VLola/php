<?php

class ProductController
{
    protected $product;

    /**
     * @return mixed
     */
    public function setProduct($id, $title, $description, $image)
    {
        $this->product = new Product($id, $title, $description, $image);
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
        echo '</div>';
    }
    public function showChangeProduct()
    {
        echo '<div class="div__change">';
        echo '<label>Title:</label>';
        echo '<textarea>';
        echo  $this->product->getTitle();
        echo '</textarea>';
        echo '<label>Description:</label>';
        echo '<textarea>';
        echo  $this->product->getDescription();
        echo '</textarea>';
        echo '<label>Image url:</label>';
        echo '<textarea>';
        echo  $this->product->getImage();
        echo '</textarea>';
        echo '<button>Save</button>';
        echo '</div>';
    }
}