<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientList extends Controller
{

    public function __invoke(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Client::all();
    }
}
