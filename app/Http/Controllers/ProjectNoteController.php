<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectNoteRepository;
use App\Services\ProjectNoteService;
use Illuminate\Http\Request;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ProjectNoteController extends Controller
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
    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
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
        return $this->clientService->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $noteId)
    {

        return $this->repository->findWhere(['project_id' =>$id, 'id' => $noteId]);
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
    public function update(Request $request, $id, $noteId)
    {
        return $this->clientService->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $noteId)
    {
        return $this->repository->delete($noteId);
    }
}
