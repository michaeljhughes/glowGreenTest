<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeveloperTest extends Model
{
    use SoftDeletes;

    protected $table = 'developer_tests';

    protected $fillable = [
        'reference', 'name', 'description',
    ];

    /*
    * Returns all test objects in database
    */
    public function getAllTestObjects()
    {
        $arrDeveloperTestObjects = $this::all();

        return $arrDeveloperTestObjects;
    }

    /*
    * Returns test object with specified id
    */
    public function getTestObjectById($intId)
    {
        $objDeveloperTest = $this::find($intId);
        
        return $objDeveloperTest;
    }

    /*
    * Dynamically updates fillable attributes with matching request data
    */
    public function updateDeveloperTest($arrRequest)
    {
        foreach ($this->fillable as $strField) {
            if(isset($arrRequest[$strField])) {
                $this->$strField = $arrRequest[$strField];
            }
        }
    }
}
