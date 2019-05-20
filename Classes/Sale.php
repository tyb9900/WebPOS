<?php


class Sale
{
    private $date;
    private $billNo;
    private $amount;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getBillNo()
    {
        return $this->billNo;
    }

    /**
     * @param mixed $billNo
     */
    public function setBillNo($billNo)
    {
        $this->billNo = $billNo;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}