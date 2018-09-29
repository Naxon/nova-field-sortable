<?php

namespace Naxon\NovaFieldSortable\Http\Controllers;

use App\Http\Controllers\Controller;
use Naxon\NovaFieldSortable\Http\Requests\ReorderResourceRequest;

class ResourceSortingController extends Controller
{
    public function handle(ReorderResourceRequest $request)
    {
        $request->findResourceOrFail()->authorizeToUpdate($request);
        $direction = $request->get('direction', null);

        if (!in_array($direction, ['up', 'down'])) {
            return response('', 500);
        }

        $model = $request->findModelQuery()->firstOrFail();

        if (!method_exists($model, 'moveOrderUp') || !method_exists($model, 'moveOrderDown')) {
            return response(__('Missing sorting methods on model :model', ['model' => get_class($model)]), 500);
        }

        if ($direction == 'up') {
            $model->moveOrderUp();
        } else {
            $model->moveOrderDown();
        }

        return response('', 200);
    }
}
