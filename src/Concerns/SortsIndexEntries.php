<?php

namespace Naxon\NovaFieldSortable\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;

trait SortsIndexEntries
{
    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        $query->when(empty($request->get('orderBy')), function (Builder $q) {
            $q->getQuery()->orders = [];

            $orderColumn = property_exists(__CLASS__, 'defaultSortField')
                ? static::$defaultSortField :
                'order_column';

            return $q->orderBy($orderColumn);
        });

        return $query;
    }
}