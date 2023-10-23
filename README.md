# Livewire Confirm Delete
Livewire Confirm Delete is a Laravel package that simplifies the process of confirming and deleting Eloquent model records with ease. It seamlessly integrates with the Livewire framework and provides a convenient way to handle model deletion while displaying confirmation dialogs and success/error messages.

## Installation
To get started with Livewire Confirm Delete, you can install it via Composer:
```bash
composer require devhereco/livewire-delete-confirmation
```
## Package Dependencies
Please make sure to include the following package dependencies in your Laravel project as they are required for Livewire Confirm Delete to work:
1. jantinnerezo/livewire-alert ^3
2. livewire/livewire ^3

## Usage
1. __Create a Livewire Component:__ that extends `ConfirmDeleteComponent`. You can define the Eloquent model you want to work with and customize your component as needed. For example:
```php
<?php

namespace App\Livewire;

use devhereco\LivewireConfirmDelete\ConfirmDeleteComponent;

class ProductComponent extends ConfirmDeleteComponent
{
    protected $model = Product::class;

    public function render()
    {
        return view('livewire.product-component');
    }
}
```
2. __Configure Your Blade View:__ In your Blade view for the Livewire component, you can display your model records and add a button or trigger that calls the `destroy` method from `ConfirmDeleteComponent`. Here's an example of how you can do this:
```blade
<!-- Displaying Model Records -->
@foreach ($products as $product)
    <div class="product">
        <h2>{{ $product->name }}</h2>
        <!-- Add a Delete Button -->
        <button wire:click="destroy({{ $product->id }})">Delete</button>
    </div>
@endforeach
```
In this example, we loop through a collection of products and display them. For each product, a "Delete" button is added with a Livewire click event to trigger the destroy method with the product's ID as a parameter. When the button is clicked, the confirmation dialog will appear.

3. __Confirmation Dialog:__ When you call the `destroy` method, a confirmation dialog will appear, prompting the user to confirm the deletion.
4. __Success/Error Messages:__ After the deletion process is completed, Livewire Confirm Delete provides success and error messages, giving feedback to the user.

## License
**This package is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).**

## Credits
Livewire Confirm Delete is developed and maintained by Mohammed B. Copyright ©2023 Development Here.







