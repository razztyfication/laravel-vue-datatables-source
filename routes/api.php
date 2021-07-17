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
            $subquery->where('first_name', 'like', "%{$request->search}%")
                     ->orWhere('last_name', 'like', "%{$request->search}%")
                     ->orWhere('email', 'like', "%{$request->search}%")
                     ->orWhere('username', 'like', "%{$request->search}%")
                     ->orWhere('address', 'like', "%{$request->search}%")
                     ->orWhere('phone_number', 'like', "%{$request->search}%")
                     ->orWhere('company', 'like', "%{$request->search}%");
        });
    }

    if ($request->sortOrder) {
        foreach ($request->sortOrder as $sort) {
            $query = $query->orderBy($sort['column'], $sort['order']);
        }
    }
    
    return response()->json($query->paginate($request->per_page));
});
