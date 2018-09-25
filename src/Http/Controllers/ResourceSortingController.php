<?php

namespace Naxon\NovaFieldSortable\Http\Controllers;

use App\Http\Controllers\Controller;
use Naxon\NovaFieldSortable\Http\Requests\ReorderResourceRequest;
use Spatie\EloquentSortable\Sortable;

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

        if (!$model instanceof Sortable) {
            return response(sprintf('Model %s is not sortable', get_class($model)), 500);
        }

        if ($direction == 'up') {
            $model->moveOrderUp();
        } else {
            $model->moveOrderDown();
        }

        return response('', 200);
    }
}
