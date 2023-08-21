<?php

namespace App\Models;

use App\Traits\PopulateTenantID;
use Eloquent as Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * Class currencySetting
 *
 * @package App\Models
 * @version October 8, 2022, 5:24 pm UTC
 * @property string $country_name
 * @property string $country_code
 * @property string $country_icon
 * @property int $id
 * @property string $currency_name
 * @property string $currency_code
 * @property string $currency_icon
 * @property string|null $tenant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\MultiTenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereCurrencyIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencySetting whereUpdatedAt($value)
 * @mixin Model
 */
class CurrencySetting extends Model
{
    use BelongsToTenant, PopulateTenantID;

    public $table = 'currency_settings';

    public $fillable = [
        'id',
        'currency_name',
        'currency_code',
        'currency_icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'country_name' => 'string',
        'country_code' => 'string',
        'country_icon' => 'string'
    ];

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
