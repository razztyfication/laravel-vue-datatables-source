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

Route::get('/', function (Request $request) {
    $query = User::query();

    if ($request->search) {
        $query = $query->where(function($subquery) use ($request) {
            $subquery->where('first_name', 'like', "%{$request->search}%")
                     ->orWhere('last_name', 'like', "%{$request->search}%")
                     ->orWhere('email', 'like', "%{$request->search}%")
                     ->orWhere('username', 'like', "%{$request->search}%")
                     ->orWhere('address', 'like', "%{$request->search}%")
                     ->orWhere('phone_number', 'like', "%{$request->search}%")
                     ->orWhere('company', 'like', "%{$request->search}%")
                     ->orWhereRaw('CONCAT_WS(" ", first_name, last_name) LIKE "%' . $request->search . '%"');
        });
    }

    if ($request->sortOrder) {
        foreach ($request->sortOrder as $sort) {
            $query = $query->orderBy($sort['column'], $sort['order']);
        }
    }
    
    return $query->paginate($request->per_page);
});
