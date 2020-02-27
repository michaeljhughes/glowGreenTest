<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeveloperTest;

class DeveloperTestController extends Controller
{
    public function index(Request $request)
    {
        // TODO: Make this endpoint load a list of objects out of the database and return them in a JSON formatted response.

        return response()->json(["data" => null, "error" => ["message" => "Not Implemented"]])->setStatusCode(501);
    }

    public function get(int $id)
    {
        // TODO: Make this endpoint load a single object out of the database and return it in a JSON formatted response.

        return response()->json(["data" => null, "error" => ["message" => "Not Implemented"]])->setStatusCode(501);
    }

    public function update(int $id, Request $request)
    {
        // TODO: Make this endpoint load and update a single object in the database, returning it in a JSON formatted response.

        return response()->json(["data" => null, "error" => ["message" => "Not Implemented"]])->setStatusCode(501);
    }

    public function create(Request $request)
    {
        // TODO: Make this endpoint create a new object in the database, returning it in a JSON formatted response.

        // REGEX Sub Test: The developer test object has a reference property which must start with 2 numbers, then 2
        // letters, then a hyphen, then a random string, so add some validation to ensure that happens.

        return response()->json(["data" => null, "error" => ["message" => "Not Implemented"]])->setStatusCode(501);
    }

    public function delete(int $id)
    {
        // TODO: Make this endpoint load and delete an object in the database, returning an acceptable successful HTTP response.

        return response()->json(["data" => null, "error" => ["message" => "Not Implemented"]])->setStatusCode(501);
    }
}
