<?php

namespace Naxon\NovaFieldSortable\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;

trait SortsIndexEntries
{
    private static array $orderColumnCache = [];

    /**
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        $query->when(empty($request->get('orderBy')), function (Builder $q) {
            $q->getQuery()->orders = [];

            return $q->orderBy(static::getOrderColumn(static::$model));
        });

        return $query;
    }

    private static function getOrderColumn(string $model): string
    {
        if (!isset(static::$orderColumnCache[$model])) {
            static::$orderColumnCache[$model] = app($model)?->sortable['order_column_name'] ?? config('eloquent-sortable.order_column_name', 'order_column');
        }

        return static::$orderColumnCache[$model];
    }
}
