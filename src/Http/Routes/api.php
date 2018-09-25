<?php

Route::patch('{resource}/{resourceId}/reorder', 'Naxon\NovaFieldSortable\Http\Controllers\ResourceSortingController@handle');
