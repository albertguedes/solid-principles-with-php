<?php declare(strict_types=1);
/**
 * This code is wrong because each derived class from stablishment behaves 
 * differently from parent class on same functions.
 * 
 * Dinner and restaurant, both make payment, perhaps, Dinner make drink but not 
 * meal, and restaurant make meal but not drink.
 * 
 * If a customer wants to eat meal and drink, any class will be able to satisfy
 * the customer.
 * 
 */
class Stablishment 
{    
    public function makePayment(): string {
        return "Payment created.\n";
    }
}

class Bar extends Stablishment 
{
    public function makeDrink(): string
    {
        return "Drink created.\n";
    }
}

/**
 * Wrong because makeInvoice isnt implemented.
 */
class Restaurant extends Stablishment 
{
    public function makeMeal(): string
    {
        return "Pasta created.\n";
    }
}

function run( Stablishment $stablishment, float $budget ): void
{
    $stablishment->makeDrink();
    $stablishment->makeMeal();
    $stablishment->makePayment($budget);    
}

// Causes exception, because Bar dont make meal.
$bar = new Bar();
run( $bar, 123,00 );

// Causes exception, because Restaurant dont make drinks.
$restaurant = new Restaurant();
run( $restaurant, 234,00 );
