<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // optional
    // protected $table = 'posts';

    // if you need to change your primary key
    // protected $primaryKey = 'title';

    // disabling timestamps (default is true)
    // protected $timestamps = false;

    // customize the timestamps through the datetime property
    // protected $dateTime = 'U'; // only stores seconds of timestamps

    // db connection drivers are defined inside config and .env
    // but lets say u r using multiple drivers, and u want to
    // use a specific driver for a specific model
    // this can be done here as well
    // protected $connection = 'sqlite';

    // if you want to add defaults to columns (that are not in the migration)
    // protected $attributes = [
    //     'is_published' => true
    // ];
}
