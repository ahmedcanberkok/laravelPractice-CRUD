<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'emp_firstname',
        'emp_lastname',
        'emp_email',
        'emp_phone',
        'emp_address',
        'emp_birthday',
        'emp_title'
    ];








    use HasFactory;
}
