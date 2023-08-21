<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PrescriptionMedicineModal
 * @package App\Models
 * @version August 2, 2022, 4:47 pm UTC
 *
 * @property integer $prescription_id
 * @property integer $medicie
 * @property varchar $dosage
 * @property varchar $day
 * @property varchar $time
 * @property varchar $comment
 */
class PrescriptionMedicineModal extends Model
{
    use HasFactory;

    public $table = 'prescriptions_medicines';
    
    public $fillable = [
        'id',
        'prescription_id',
        'medicine',
        'dosage',
        'day',
        'time',
        'comment',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'prescription_id' => 'integer',
        'medicine'        => 'integer',
        'dosage'          => 'string',
        'day'             => 'string',
        'time'            => 'string',
        'comment'         => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prescription(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Prescription::class, 'prescription_id');
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicines(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Medicine::class, 'id');
    }

}
