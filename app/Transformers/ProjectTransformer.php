<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 26/08/15
 * Time: 22:39
 */

namespace App\Transformers;

use App\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    public function transform(Project $project)
    {
        return [
            'project_id' => $project->id,
            'project' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date
        ];
    }

}