<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class bloguser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "bloguser";
    protected $primaryKey = "user_id";
}
