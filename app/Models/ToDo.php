<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    public $table='to_dos';
    protected $primaryKey='id';
    public $timestamp='false';
    protected $fillable=['title','completed'];
}
