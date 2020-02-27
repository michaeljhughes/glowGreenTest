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
}
