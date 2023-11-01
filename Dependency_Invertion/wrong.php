<?php declare(strict_types=1);
/**
 * This is wrong because B is highly dependent of A class. If we copy B to 
 * another code, its necessary copy A class too.
 */
class Stablishment 
{
    public function makeOrder(): void
    {
        echo 'Order created.' . PHP_EOL;
    }

    public function makePayment(float $amount): void
    {
        echo 'Payment received, amount {$amount}.' . PHP_EOL;
    }
}

class Restaurant extends Stablishment 
{
    public function makeMeal(): void
    {
        echo 'Meal order created.' . PHP_EOL;
    }
}

class Shopping {

    private Stablishment $stablishment;

    public function __construct()
    {
        // Here is wrong, because stablishment can be defined only as Restaurant
        // stablishment. If we wish that Shopping run an Dinner stablishment,
        // we can't. Because this, Shopping is strongly dependent of Restaurant.
        $this->stablishment = new Restaurant();
    }

    public function run(): void
    {
        $this->stablishment->makeMeal();
        $this->stablishment->makeOrder();
        $this->stablishment->makePayment(10);

    }
}

$shopping = new Shopping();
$shopping->run();
