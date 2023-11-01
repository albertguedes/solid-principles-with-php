<?php declare(strict_types=1);
/**
 * This is wrong by open-closed principle ( and by single responsability too, 
 * but is no matter for now ) because Payment isn't open to new and complex 
 * payments methods, they accept only cash not other methods like credit card.
 */
class Payment 
{
    /**
     * We define only cash method of payment. Any other causes exception.
     *
     * @return string
     */
    public function execute (float $value, string $method): void 
    {
        if($method != 'Cash'){
            throw new \Exception('Invalid method');
        }

        echo "Cash selected. Payment created. Value: {$value}." . PHP_EOL;
    }
}

$payment = new Payment();

$value = 100;
$method = 'Cash';
$payment->execute( $value, $method );

/**
 * The Credit Card payment dont exists, and we need to implement it.
 * But we will not do this without modification of Payment class.
 * See that needs too set the credit card number too, that increase the 
 * complexity of payment.
 */
$value = 200;
$method = 'Credit Card';
$credit_card_number = 123456789;
$payment->execute( $value, $method, $credit_card_number );
