<?php declare(strict_types=1);
/**
 * This is right because we decouple Shopping from Restaurant, and now, Shopping
 * can run any type of Stablishment.
 */
class Stablishment 
{
    public function makeOrder(): string 
    {
        return "Order created.\n";
    }

    public function makePayment(): string 
    {
        return "Payment created.\n";
    }
}

class Dinner extends Stablishment 
{
    public function makeMeal(): string 
    {
        return "Pie created.\n";
    }    
}

class Restaurant extends Stablishment
{
    public function makeMeal(): string 
    {
        return "Pasta created.\n";
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
