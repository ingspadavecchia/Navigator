<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientListController extends Controller
{

    public function __invoke(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Client::all();
    }
}
