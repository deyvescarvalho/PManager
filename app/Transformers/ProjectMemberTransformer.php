<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 26/08/15
 * Time: 22:39
 */

namespace App\Transformers;

use App\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return [
            'member_id' => $member->id,
            'name' => $member->name
        ];
    }

}