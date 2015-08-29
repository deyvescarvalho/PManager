<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 26/08/15
 * Time: 22:47
 */

namespace App\Presenters;
use App\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ProjectTransformer();
    }
}