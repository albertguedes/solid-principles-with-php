<?php declare(strict_types=1);
/**
 * This is right because Stablishment can replace Bar and Restaurant.
 */
class Stablishment 
{    
    public function makePayment(float $value): void {
        echo 'Payment created. The value is $' . $value . '.' . PHP_EOL;
    }

    public function makeMeal(): void
    {
        echo 'Peannuts created.' . PHP_EOL;
    }

    public function makeDrink(): void {
        echo 'Water created.' . PHP_EOL;
    }
}

/**
 * Now, dinner make meal without need to implement this.
 */
class Bar extends Stablishment 
{
    public function makeDrink(): void
    {
        echo 'Bar drink created.' . PHP_EOL;
    }
}

/**
 * And restaurant make drinks without need implement this too.
 */
class Restaurant extends Stablishment 
{
    public function makeMeal(): void
    {
        echo 'Restaurant pasta created.' . PHP_EOL;
    }
}

/**
 * The function now is more restrictive, accepting only food stablishments, 
 * preventing without inconsistences.
 *
 * @param FoodStablishment $stablishment
 * @param float $budget
 * @return void
 */
function run (Stablishment $stablishment, float $budget): void
{
    $stablishment->makeDrink();
    $stablishment->makeMeal();
    $stablishment->makePayment($budget);
    echo PHP_EOL;
}

// Works fine.
$bar = new Bar();
run( $bar, 123.00 );

// Works fine.
$restaurant = new Restaurant();
run( $restaurant, 234.00 );

// Works fine.
$stablishment = new Stablishment();
run( $stablishment, 345.00 );
