<?php


class Stock
{
    private  $article;
    private  $quantity;

    public function __construct()
    {

    }

    public function addStock()
    {

    }

    public function updateStock()
    {

    }

    public function removeStock()
    {

    }

    public function getStock()
    {

    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}