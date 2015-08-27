<?php

namespace App\Http\Controllers;
use App\Repositories\ProjectRepository;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ProjectFileController extends Controller
{
    /**
     * @var ClientRepository
     */

    private $repository;
    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * @param ClientRepository $repository
     * @param ClientService $clientService
     */
    public function __construct(ProjectRepository $repository, ProjectService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        echo $request->name;

        Storage::put($request->name.".".$extension, File::get($file));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($this->checkProjectOwner($id)==false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkProjectOwner($id)==false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->clientService->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->checkProjectOwner($id)==false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId)
    {
        if( $this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)){
            return true;
        }
        return false;
    }
}
