<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeveloperTest;
use Illuminate\Support\Facades\Validator;

class DeveloperTestController extends Controller
{
    public function index(Request $request)
    {
        // TASK: Make this endpoint load a list of objects out of the database and return them in a JSON formatted response.

        // Initiate Model
        $objDeveloperTest = new DeveloperTest();
        // Get all developer tests from model
        $arrDeveloperTests = $objDeveloperTest->getAllTestObjects()->toArray();

        // Give response if no developer tests found
        if(!is_array($arrDeveloperTests) || count($arrDeveloperTests) === 0) {
            return response()->json(["data" => null, "error" => ["message" => "No Developer Tests Found"]])->setStatusCode(404);
        }

        // Return array of all developer tests
        return response()->json(["data" => $arrDeveloperTests, "success" => ["message" => "Tests fetched successfully!"]])->setStatusCode(200);
    }

    public function get(int $id)
    {
        // TASK: Make this endpoint load a single object out of the database and return it in a JSON formatted response.

        // Initiate Model
        $objDeveloperTest = new DeveloperTest();
        // Get developer test by id
        $objTest = $objDeveloperTest->getTestObjectById($id);

        // Give response if no developer test found with id supplied
        if(!$objTest) {
            return response()->json(["data" => null, "error" => ["message" => "No Developer Test Found with Id: " . $id]])->setStatusCode(404);
        }

        // Return data for developer test with id supplied
        return response()->json(["data" => $objTest, "success" => ["message" => "Test fetched successfully!"]])->setStatusCode(200);
    }

    public function update(int $id, Request $request)
    {
        // TASK: Make this endpoint load and update a single object in the database, returning it in a JSON formatted response.

        // Added validation specified in create task as this seemed logical
        // Includes custom message to be more helpful
        $validator = Validator::make($request->all(), [
            'reference' => 'regex:/^[\d]{2}[a-zA-Z]{2}-[\w]+$/'
        ],[
            'reference.regex' => 'Reference must be 2 numbers, followed by 2 letters, a hyphen and a random string.'
        ]);

        // Gives response with failures if regex validation doesn't pass
        if ($validator->fails()) {
            return response()->json(["data" => $validator->messages(), "error" => ["message" => "Validation Failed!"]])->setStatusCode(400);
        }

        // Initialise Model
        $objDeveloperTest = new DeveloperTest();
        // Get the developer test by id supplied
        $objTest = $objDeveloperTest->getTestObjectById($id);
        $arrRequest = $request->toArray();

        // Give response if no developer test found with id supplied
        if(!$objTest) {
            return response()->json(["data" => null, "error" => ["message" => "No Developer Test Found with Id: " . $id]])->setStatusCode(404);
        }

        // Update developer test with supplied data
        $objTest->updateDeveloperTest($arrRequest);
        // Save Model
        $objTest->save();

        // Get array of updated fields, minus updated timestamp
        $arrUpdatedFields = $objTest->getChanges();
        unset($arrUpdatedFields['updated_at']);

        // Gives response if no fields were updated
        if(count($objTest->getChanges()) === 0) {
            return response()->json(["data" => $objTest, "error" => ["message" => "No fields updated."]])->setStatusCode(400);
        }

        // Return new updated data for developer task, with list of updated fields
        return response()->json(["data" => $objTest, "success" => ["message" => "Successfully updated fields: " . implode(', ', array_keys($arrUpdatedFields))]])->setStatusCode(200);
    }

    public function create(Request $request)
    {
        // TASK: Make this endpoint create a new object in the database, returning it in a JSON formatted response.
        // REGEX Sub Task: The developer test object has a reference property which must start with 2 numbers, then 2
        // letters, then a hyphen, then a random string, so add some validation to ensure that happens.

        // Validate user input for name, reference and description
        // Reference regex validation has custom message to be more useful
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'reference' => 'required|regex:/^[\d]{2}[a-zA-Z]{2}-[\w]+$/',
            'description' => 'required'
        ],[
            'reference.regex' => 'Reference must be 2 numbers, followed by 2 letters, a hyphen and a random string.'
        ]);
         
        // Gives response with failures if regex validation doesn't pass or missing required fields
        if ($validator->fails()) {
            return response()->json(["data" => $validator->messages(), "error" => ["message" => "Validation Failed!"]])->setStatusCode(400);
        }

        // Initialise Model
        $objDeveloperTest = new DeveloperTest();
        $arrRequest = $request->toArray();

        // Update model with supplied user data
        $objDeveloperTest->updateDeveloperTest($arrRequest);
        // Save model to create new record
        $objDeveloperTest->save();

        // Return newly created object data to user
        return response()->json(["data" => $objDeveloperTest, "success" => ["message" => "Successfully created record!"]])->setStatusCode(201);
    }

    public function delete(int $id)
    {
        // TASK: Make this endpoint load and delete an object in the database, returning an acceptable successful HTTP response.
        
        // Initialise Model
        $objDeveloperTest = new DeveloperTest();
        // Get developer test by supplied Id
        $objTest = $objDeveloperTest->getTestObjectById($id);

        // Give response if no test found with supplied Id
        if(!$objTest) {
            return response()->json(["data" => null, "error" => ["message" => "No Developer Test Found with Id: " . $id]])->setStatusCode(404);
        }

        // Delete record - Note: Soft delete so will only update field 'deleted_at'
        $objTest->delete();

        // Return data for deleted record along with success message
        return response()->json(["data" => $objTest, "success" => ["message" => "Successfully deleted record!"]])->setStatusCode(200);
    }
}
