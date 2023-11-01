<?php declare(strict_types=1);
/**
 * This class is wrong by single responsability principle because that 
 * the Restaurant do all things: make order, make meal, make payment ... if 
 * we need create more meals type, more orders type, more payments type, we 
 * should create more Restaurant methods, and if we need to add more products
 * as drinks, dishes, t-shirts ... we need to create more functions that alter 
 * the other functions and turning the class very complex.
 */
class Restaurant 
{
    public function makeOrder(): void
    {
        echo 'Order created.' . PHP_EOL;
    }

    public function sendOrder(): void
    {
        echo 'Order sended.' . PHP_EOL;
    }

    public function OrderReceived(): bool
    {
        return true;
    }

    public function makeMeal(): void
    {
        echo 'Meal created.' . PHP_EOL;
    }

    public function sendMeal(): void
    {
        echo 'Meal sended.' . PHP_EOL;
    }

    public function MealReceived(): bool
    {
        return true;
    }

    public function makePayment(): void
    {
        echo 'Payment created.' . PHP_EOL;
    }

    public function sendPayment(): void
    {
        echo 'Payment sended.' . PHP_EOL;
    }

    public function PaymentReceived(): bool
    {
        return true;
    }
}

$restaurant = new Restaurant();

$restaurant->makeOrder();
$restaurant->sendOrder();

if ($restaurant->OrderReceived())
{
    $restaurant->makeMeal();
    $restaurant->sendMeal();
    
    if ($restaurant->MealReceived()) 
    {
        $restaurant->makePayment();
        $restaurant->sendPayment();

        if ($restaurant->PaymentReceived())
        {
            echo 'Payment received.' . PHP_EOL;
        }
        else {
            echo 'Payment dont received.' . PHP_EOL;
            echo 'Jail the customer !!!' . PHP_EOL;
        }
    }
    else {
        echo 'Meal dont received.' . PHP_EOL;
        echo 'Customer cancel the order.' . PHP_EOL;
    }
}
else{
    echo 'Order dont received.' . PHP_EOL;
    echo 'The cook does not want to cook.' . PHP_EOL;
}
