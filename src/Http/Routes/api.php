<?php

Route::patch('/naxon/nova-field-sortable/{resource}/{resourceId}/reorder', 'Naxon\NovaFieldSortable\Http\Controllers\ResourceSortingController@handle');