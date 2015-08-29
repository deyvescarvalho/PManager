<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 22/08/15
 * Time: 02:37
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    ];
}