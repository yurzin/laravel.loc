<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $primaryKey = 'Code';
    protected $keyType = 'string';
    public $incrementing = false;
}
