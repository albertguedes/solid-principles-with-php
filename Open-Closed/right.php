<?php declare(strict_types=1);
/**
 * This is right with open closed principle because the payment isn't 
 * dependent of the payment method. You can create as many types of payment 
 * credits you want without necessity of alter the Payment class.
 * 
 * Here we use abstract of class as extension, but can use interface to force to 
 * create the 'use' or 'makePayment' method as sample.
 */
abstract class Payment 
{
    public function execute(float $value): string
    {
        return "Payment created. Value: {$value}" . PHP_EOL;
    }
}

class Cash extends Payment 
{
    public function use(): self
    {
        echo "Cash selected. Done." . PHP_EOL;

        return $this;
    }
}

/**
 * Credit card payment is more complex that cash. Here we only representing 
 * the 'use' or 'execute' method.
 */
class CreditCard extends Payment 
{
    protected $number;

    public function use(): self
    {
        echo "Credit card selected. Processing ... done!" . PHP_EOL;

        return $this;
    }

    public function setNumber (int $number): self 
    {
        $this->number = $number;

        return $this;
    }
}

// A customer wants to pay with cash.
$value = 100.00;
$payment = new Cash();
$payment->use()
        ->execute($value);

/**
 * Now, we can create any method of payment without modify the Payment abstract 
 * class. In this case, we create a credit card method, that is more complex and 
 * needs some data from owner, and process via api to create the payment, etc.
 * And we make all of this without touch on Payment class, only creating an 
 * extension to Payment.
 */
$value = 200.00;
$number = 123456789;
$payment = new CreditCard();
$payment->use()
        ->setNumber($number)
        ->execute($value);
