<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ClientListController extends Controller
{

    public function __invoke(Request $request): Collection
    {
        return Client::all();
    }
}
