<?php

namespace App\Repositories;

use App\Models\Medicine;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionMedicineModal;
use App\Models\Setting;
use Auth;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PrescriptionRepository
 * @version March 31, 2020, 12:22 pm UTC
 */
class PrescriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patient_id',
        'food_allergies',
        'tendency_bleed',
        'heart_disease',
        'high_blood_pressure',
        'diabetic',
        'surgery',
        'accident',
        'others',
        'medical_history',
        'current_medication',
        'female_pregnancy',
        'breast_feeding',
        'health_insurance',
        'low_income',
        'reference',
        'status',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Prescription::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPatients()
    {
        $user = Auth::user();
        if ($user->hasRole('Doctor')) {
            $patients = getPatientsList($user->owner_id);
        } else {
            $patients = Patient::with('user')
                ->whereHas('user', function (Builder $query) {
                    $query->where('status', 1);
                })->get()->pluck('user.full_name', 'id')->sort();
        }

        return $patients;
    }

    /**
     * @param  array  $prescription
     * @param  array  $input
     *
     * @return bool|Builder|Builder[]|Collection|Model
     */
//    public function update($prescription, $input)
//    {
//        try {
//            /** @var Prescription $prescription */
//            $prescription->update($input);
//
//            return true;
//        } catch (Exception $e) {
//            throw new UnprocessableEntityHttpException($e->getMessage());
//        }
//    }

    /**
     * @param  array  $input
     */
    public function createNotification($input)
    {
        try {
            $patient = Patient::with('user')->where('id', $input['patient_id'])->first();

            addNotification([
                Notification::NOTIFICATION_TYPE['Prescription'],
                $patient->user_id,
                Notification::NOTIFICATION_FOR[Notification::PATIENT],
                $patient->user->full_name.' your prescription has been created.',
            ]);
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     *
     *
     * @return array
     */
    public function getMedicines(): array
    {
        $data['medicines'] = Medicine::all()->pluck('name', 'id')->toArray();

        return $data;
    }

    /**
     * @param array $input
     * @param Model $prescription
     *
     * 
     */
    public function createPrescription(array $input, Model $prescription)
    {
        try {

            foreach ($input['medicine'] as $key => $value) {
                $PrescriptionItem = [
                    'prescription_id' => $prescription->id,
                    'medicine'        => $input['medicine'][$key],
                    'dosage'          => $input['dosage'][$key],
                    'day'             => $input['day'][$key],
                    'time'            => $input['time'][$key],
                    'comment'         => $input['comment'][$key],
                ];
                PrescriptionMedicineModal::create($PrescriptionItem);
            }
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $prescription
     * @param $input
     *
     *
     * @return mixed
     */
    public function prescriptionUpdate($prescription, $input)
    {
        try {
            $prescriptionMedicineArr = \Arr::only($input, $this->model->getFillable());
            $prescription->update($prescriptionMedicineArr);
            $prescription->getMedicine()->delete();

            if(!empty($input['medicine'])) {
                foreach ($input['medicine'] as $key => $value) {
                    $PrescriptionItem = [
                        'prescription_id' => $prescription->id,
                        'medicine'        => $input['medicine'][$key],
                        'dosage'          => $input['dosage'][$key],
                        'day'             => $input['day'][$key],
                        'time'            => $input['time'][$key],
                        'comment'         => $input['comment'][$key],
                    ];
                    PrescriptionMedicineModal::create($PrescriptionItem);
                }
            }
        }
        catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        return $prescription;
    }

    /**
     * @param $id
     *
     *
     * @return array
     */
    public function getData($id)
    {
        $data['prescription'] = Prescription::with('patient', 'doctor', 'getMedicine')
                                            ->findOrFail($id);
//        foreach($data['prescription']->getMedicine as $medicine) {
//            $data['medicine'] = Medicine::where('id', $medicine->medicine)->get();
//            dump($data['medicine']);
//        }
        
//        $data['prescription_medicine'] = PrescriptionMedicineModal::with('medicines')->where('prescription_id', $id)->get();
        
        return $data;
    }

    /**
     * @param $id
     *
     *
     * @return array
     */
    public function getMedicineData($id)
    {
        $data['prescription'] = Prescription::with('patient', 'doctor', 'getMedicine')
            ->findOrFail($id);
        
        $medicines = [];
        foreach($data['prescription']->getMedicine as $medicine) {
            $data['medicine'] = Medicine::where('id', $medicine->medicine)->get();
            array_push($medicines, $data['medicine']);
        }
        return $medicines;
    }

    /**
     *
     *
     * @return array
     */
    public function getSettingList()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return $settings;
    }
}
