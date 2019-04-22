<?php


class Stock
{
    private  $productCode;
    private  $productName;
    private  $productCategory;
    private  $productCostPrice;
    private  $productRetailPrice;
    private  $productQuantity;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param mixed $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * @param mixed $productCategory
     */
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * @return mixed
     */
    public function getProductCostPrice()
    {
        return $this->productCostPrice;
    }

    /**
     * @param mixed $productCostPrice
     */
    public function setProductCostPrice($productCostPrice)
    {
        $this->productCostPrice = $productCostPrice;
    }

    /**
     * @return mixed
     */
    public function getProductRetailPrice()
    {
        return $this->productRetailPrice;
    }

    /**
     * @param mixed $productRetailPrice
     */
    public function setProductRetailPrice($productRetailPrice)
    {
        $this->productRetailPrice = $productRetailPrice;
    }

    /**
     * @return mixed
     */
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    /**
     * @param mixed $productQuantity
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;
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
}