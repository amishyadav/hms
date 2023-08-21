<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class AdminRepository
 * @package App\Repositories
 * @version October 1, 2022, 7:18 pm UTC
 */
class AdminRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'password',
        'confirm_password',
        'tenant_id',
        'owner_id',
        'owner_type',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return User::class;
    }

    public function store($input)
    {
        try {
            $data = [
                'first_name'        => $input['first_name'],
                'last_name'         => $input['last_name'],
                'email'             => $input['email'],
                'password'          => Hash::make($input['password']),
                'phone'             => preparePhoneNumber($input, 'phone'),
                'email_verified_at' => Carbon::now(),
                'tenant_id'         => null,
                'owner_type'        => null,
                'owner_id'          => null,
                'status'            => 1,
            ];

            $user = User::create($data);
            if (isset($input['image']) && !empty($input['image'])) {
                $mediaId = storeProfileImage($user, $input['image']);
            }
            $input['department_id'] = Department::whereName('Super Admin')->first()->id;
            $user->assignRole($input['department_id']);

        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $user
     * @param $input
     */
    public function update($user, $input)
    {
        try {
            $data = [
                'first_name'        => $input['first_name'],
                'last_name'         => $input['last_name'],
                'email'             => $input['email'],
                'phone'             => preparePhoneNumber($input, 'phone'),
                'tenant_id'         => null,
                'owner_type'        => null,
                'owner_id'          => null,
            ];

            if (isset($input['image']) && !empty($input['image'])) {
                $mediaId = updateProfileImage($user, $input['image']);
            }
            if ($input['avatar_remove'] == 1 && isset($input['avatar_remove']) && !empty($input['avatar_remove'])) {
                removeFile($user, User::COLLECTION_PROFILE_PICTURES);
            }

            $user->update($data);
            return true;
            
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function delete($id)
    {
        try {
            $user = $this->find($id);
            $user->clearMediaCollection(User::COLLECTION_PROFILE_PICTURES);
            $user->delete($id);
            
        }catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
