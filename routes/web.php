<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

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