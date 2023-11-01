<?php declare(strict_types=1);
/**
 * This is right because now we can distinguish naturally the virtual to 
 * physical stablishment, one with close doors and another not.
 */
abstract class Stablishment 
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

abstract class PhysicalStablishment extends Stablishment 
{ 
    public function closeDoors(): void
    {
        echo 'Doors closed.' . PHP_EOL;
    }    
}

abstract class VirtualStablishment extends Stablishment 
{
    public function closeSessions(): void
    {
        echo 'Sessions closed.' . PHP_EOL;
    }
}

class Restaurant extends PhysicalStablishment 
{
    public function makeOrder(): void
    {
        echo 'Meal order created.' . PHP_EOL;
    }

    public function makePayment(float $amount): void
    {
        echo 'Payment for the meal received, amount {$amount}.' . PHP_EOL;
    }

    public function closeDoors(): void
    {
        echo 'Restaurant doors closed.' . PHP_EOL;
    }
}

class Ecommerce extends VirtualStablishment 
{
    public function makeOrder(): void
    {
        echo 'Online order created.' . PHP_EOL;
    }

    public function makePayment(float $amount): void
    {
        echo 'Online payment received, amount {$amount}.' . PHP_EOL;
    }

    public function closeSessions(): void
    {
        echo 'Sessions closed.' . PHP_EOL;
    }
}

class Shopping
{
    public function run (Stablishment $stablishment): void
    {        
        $stablishment->makeOrder();
        $stablishment->makePayment(10);

        // Now, any class that extends PhysicalStablishment can call 
        // closeDoors, without need to create more if conditions. 
        if ($stablishment instanceof PhysicalStablishment) 
        {
            $stablishment->closeDoors();
        }

        // VirtualStablishment can call closeSessions. 
        if ($stablishment instanceof VirtualStablishment) 
        {
            $stablishment->closeSessions();
        }
    }
}

$shopping = new Shopping();

$restaurant = new Restaurant();
$shopping->run($restaurant);

echo PHP_EOL;

$ecommerce = new Ecommerce();
$shopping->run($ecommerce);