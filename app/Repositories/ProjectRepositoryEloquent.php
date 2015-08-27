<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function isOwner($projectId, $userId)
    {
        if(count($this->findWhere(['id' => $projectId, 'owner_id' => $userId]))){
            return true;
        }
        return false;

    }

    public function hasMember($project_id, $member_id)
    {
        $project = $this->find($project_id);
        foreach ($project->members as $member ) {
            if($member->id == $member_id){
                return true;
            }
        }
        return false;

    }

    public function presenter()
    {
        return
    }
}