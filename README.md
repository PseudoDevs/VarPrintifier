# VarPrintifier
A PHP package that provides a simple and easy-to-use function to pretty print variables for debugging purposes.

![Printifier](https://i.ibb.co/7p0sYMy/Var-Printifier.png)
# Installation
This package can be easily installed using Composer. Run the following command to add it to your project's dependencies:

`composer require iamjohndev/var-print-prettifier`

# Usage
```php
use iamjohndev\VarPrintPrettifier;

$data = [
    'name' => 'John Doe',
    'age' => 30,
    'email' => 'johndoe@example.com',
    'address' => [
        'street' => '123 Main St',
        'city' => 'Anytown',
        'state' => 'CA',
        'zip' => '12345'
    ]
];

VarPrintifier::var_dump($data);
VarPrintifier::print_r($data);
```

The dump method pretty prints the given variable in a human-readable format. It can be used to debug complex data structures and objects.
