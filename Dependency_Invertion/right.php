<?php declare(strict_types=1);
/**
 * This is right because we decouple Shopping from Restaurant, and now, Shopping
 * can run any type of Stablishment.
 */
class Stablishment 
{
    public function makeOrder(): void
    {
        echo 'Order created.' . PHP_EOL;
    }

    public function makePayment(): void
    {
        echo 'Payment created.' . PHP_EOL;
    }
}

class Dinner extends Stablishment 
{
    public function makeMeal(): void
    {
        echo 'Pie created.' . PHP_EOL;
    }    
}

class Restaurant extends Stablishment
{
    public function makeMeal(): void 
    {
        echo 'Pasta created.';
    }    
}

class Shopping 
{
    private Stablishment $stablishment;

    public function __construct (Stablishment $stablishment)
    {
        // This is right, because Shopping not depend of Restaurant and can run
        // any type o Stablishment.
        $this->stablishment = $stablishment;
    }

    public function run(): void
    {
        $this->stablishment->makeMeal();
        $this->stablishment->makeOrder();
        $this->stablishment->makePayment(10);
    }
}

$dinner = new Dinner();
$shopping = new Shopping($dinner);
$shopping->run();

$restaurant = new Restaurant();
$shopping = new Shopping($restaurant);
$shopping->run();
