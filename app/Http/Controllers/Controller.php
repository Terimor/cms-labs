<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function renderModel($model) {
        if (!$model instanceof \App\Interfaces\IRenderableModel) {
            trigger_error('Model does not implements IRenderableModel interface, so it can\'t be rendered');
        }

        return view($model->getTemplateName(), ['model' => $model]);
    }
}
