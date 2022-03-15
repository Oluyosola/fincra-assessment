<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Customer extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'customers';
    protected $guarded = [];
    protected $primaryKey = '_id';
    protected $dates = ['created_at'];
}
