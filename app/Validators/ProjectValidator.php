<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 22/08/15
 * Time: 02:37
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required'
    ];
}