<?php declare(strict_types=1);

/**
 * This is right because any object - restaurant, dinner or foodTruck - can 
 * replace the stablishment object without affect the code behavior.
 */
abstract class Stablishment 
{    
    public function makePayment(): void {
        echo 'Payment created.' . PHP_EOL;
    }
}

/**
 * Here,we group the methods of all type of food stablishments. In this way, an
 * dinner and restaurant can replace the stablishment.
 */
abstract class FoodStablishment extends Stablishment
{
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
class Bar extends FoodStablishment 
{
    public function makeDrink(): void
    {
        echo 'Bar drink created.' . PHP_EOL;
    }
}

/**
 * And restaurant make drinks without need implement this too.
 */
class Restaurant extends FoodStablishment 
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
function run (FoodStablishment $stablishment, float $budget): void
{
    $stablishment->makeDrink();
    $stablishment->makeMeal();
    $stablishment->makePayment($budget);
    echo PHP_EOL;
}

// Works fine.
$bar = new Bar();
run( $bar, 123 );

// Works fine.
$restaurant = new Restaurant();
run( $restaurant, 123 );
