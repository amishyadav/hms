<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Admin
 * @package App\Models
 * @version October 1, 2022, 7:18 pm UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $contact_no
 * @property string $password
 * @property string $confirm_password
 */
class Admin extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'admins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'password',
        'confirm_password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'contact_no' => 'string',
        'password' => 'string',
        'confirm_password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
