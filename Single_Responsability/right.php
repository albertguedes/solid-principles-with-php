<?php declare(strict_types=1);
/**
 * This is the right way conform the single responsability principle because
 * we have now a waiter, a kitten and a register to deal with each process at 
 * each time: waiter deal with orders, kitten deal with kitten and register deal
 * with payments. Just reading this your mind understanding each role naturally,
 * because this we use the single responsability and because if we need to add
 * more features - as new products, drinks - we dont need to alter the waiter or 
 * payment, only the kitten. If we need to add a new payment type, we modify 
 * only payment, waiter and kitten stay untouchble. This is more simple.
 */
class Waiter 
{
    public function makeOrder(): self 
    {
        echo 'Order created.' . PHP_EOL;

        return $this;
    }

    public function sendOrder(): self 
    {
        echo 'Order sended.' . PHP_EOL;

        return $this;
    }

    public function orderReceived(): bool 
    {
        return true;
    }
}

class Kitchen 
{
    private $meal_consumed = true;

    public function makeMeal(): self 
    {
        echo 'Making meal.' . PHP_EOL;

        return $this;
    }

    public function sendMeal(): self
    {
        echo 'Send meal to the client.' . PHP_EOL;

        return $this;
    }

    public function mealReceived(): bool
    {
        return true;
    }
}

class Register
{
    public function makePayment(): self
    {
        echo 'Payment created.' . PHP_EOL;

        return $this;
    }

    public function sendPayment(): self
    {
        echo 'Payment sended.' . PHP_EOL;

        return $this;
    }

    public function paymentReceived(): bool
    {
        return true;
    }
}

$waiter   = new Waiter();
$kitchen  = new Kitchen();
$register = new Register();

$waiter->makeOrder()
       ->sendOrder();

if ($waiter->orderReceived())
{
    $kitchen->makeMeal()
            ->sendMeal();

    if ($kitchen->mealReceived()) 
    {
        $register->makePayment()
                 ->sendPayment();

        if ($register->paymentReceived())
        {
            echo 'Payment received.' . PHP_EOL;
        }
        else{
            echo 'Payment not received.' . PHP_EOL;
            echo 'Jail the customer !!!' . PHP_EOL;
        }
    }
    else
    {
        echo 'Meal not received.' . PHP_EOL;
        echo 'The customer dont want to eat!' . PHP_EOL;
    }
}
else{
    echo 'Order not received.' . PHP_EOL;
    echo 'The cook does not want to cook!' . PHP_EOL;
}
