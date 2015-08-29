<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 22/08/15
 * Time: 02:37
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required'
    ];
}