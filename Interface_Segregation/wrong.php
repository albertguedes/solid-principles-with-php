<?php declare(strict_types=1);
/**
 * This is wrong because stablishment implements a 'closeDoors' functions that 
 * only physical stablishment use, not an ecommerce. 
 * See on shopping that they need to implement closeDoors to all stablishment 
 * and that ecommerce dont use - is a stablishment owned by the shopping, but 
 * exists only online. Dont ask.
 * Isn't a way to separate the physical from virtual stablishment, only 
 * explicitly by name.
 */
class Stablishment 
{
    public function makeOrder(): void 
    {
        echo 'Order created.' . PHP_EOL;
    }

    public function makePayment(float $amount): void
    {
        echo "Payment received, amount {$amount}." . PHP_EOL;
    }

    public function closeDoors(): void
    {
        echo 'Doors closed.' . PHP_EOL;
    }

    public function closeSessions(): void
    {
        echo 'Sessions closed.' . PHP_EOL;
    }
}

class Restaurant extends Stablishment 
{
    public function makeOrder(): void
    {
        echo 'Meal order created.' . PHP_EOL;
    }

    public function makePayment(float $amount): void
    {
        echo "Payment for the meal received, amount {$amount}." . PHP_EOL;
    }

    public function closeDoors(): void 
    {
        echo 'Restaurant doors closed.' . PHP_EOL;
    }
}

class Ecommerce extends Stablishment 
{
    public function makeOrder(): void
    {
        echo 'Online order created.' . PHP_EOL;
    }

    public function makePayment (float $amount): void
    {
        echo "Online payment received, amount {$amount}." . PHP_EOL;
    }

    public function closeSessions(): void 
    {
        echo 'Ecommerce sessions closed.' . PHP_EOL;
    }
}

function run (Stablishment $stablishment): void
{
    $stablishment->makeOrder();
    $stablishment->makePayment(10);

    // The problem is here is that closeDoors is applicable only to 
    // Restaurant class. If we need more physical stablishments, we need to 
    // create an if condition for each of them. 
    if ($stablishment instanceof Restaurant){
        $stablishment->closeDoors();
    }

    // The same happens with ecommerce. This works, but is unmantennable.
    if ($stablishment instanceof Ecommerce){
        $stablishment->closeSessions();
    }
}

$restaurant = new Restaurant();
run($restaurant);

$ecommerce = new Ecommerce();
run($ecommerce);

/**
 * This code runs fine, but the maintainance is not good. 
 * The methods are very dependable of the concrete class. If we create an Bar 
 * class, the door isnt at end of the day or we need to add more one if on run 
 * function, what is a ugly way to maintain the code.
 */
