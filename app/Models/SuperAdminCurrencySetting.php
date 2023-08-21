<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdminCurrencySetting extends Model
{
    use HasFactory;

    protected $table = 'super_admin_currency_settings';
    protected $fillable = ['currency_name', 'currency_code', 'currency_icon'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'currency_name' => 'required|max:25',
        'currency_icon' => 'required',
        'currency_code' => 'required|min:3|max:3',
    ];
}
