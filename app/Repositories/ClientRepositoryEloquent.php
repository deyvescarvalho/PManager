<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 21/08/15
 * Time: 18:42
 */

namespace App\Repositories;


use App\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}