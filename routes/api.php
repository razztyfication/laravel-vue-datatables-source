<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('table', function (Request $request) {
    $query = User::query();

    if ($request->search) {
        $query = $query->where(function($subquery) use ($request) {
            $subquery->where('first_name', 'LIKE', "'%" . $request->search . "%'")
                     ->orWhere('last_name', 'LIKE', "'%" . $request->search . "%'")
                     ->orWhere('email', 'LIKE', "'%" . $request->search . "%'")
                     ->orWhere('username', 'LIKE', "'%" . $request->search . "%'")
                     ->orWhere('address', 'LIKE', "'%" . $request->search . "%'")
                     ->orWhere('phone_number', 'LIKE', "'%" . $request->search . "%'")
                     ->orWhere('company', 'LIKE', "'%" . $request->search . "%'");
        });
    }

    if ($request->sortOrder) {
        foreach ($request->sortOrder as $sort) {
            $query = $query->orderBy($sort['column'], $sort['order']);
        }
    }
    
    return response()->json($query->paginate($request->per_page)->withQueryString());
});

\URL::forceScheme('https');