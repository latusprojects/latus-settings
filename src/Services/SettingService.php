<?php


namespace Latus\Settings\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Latus\Settings\Models\Setting;
use Latus\Settings\Repositories\Contracts\SettingRepository;

class SettingService
{

    public static array $create_validation_rules = [
        'key' => 'required|string|min:5',
        'value' => 'sometimes|string|max:255|nullable',
        'value_long' => 'required_if:value,null'
    ];

    public function __construct(
        protected SettingRepository $settingRepository
    )
    {
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function createSetting(array $attributes): Model
    {
        $validator = Validator::make($attributes, self::$create_validation_rules);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $this->settingRepository->create($attributes);
    }

    public function deleteSetting(Setting $setting)
    {
        $this->settingRepository->delete($setting);
    }

    public function find(int|string $id): Model|null
    {
        return $this->settingRepository->find($id);
    }

    public function findByKey(string $key): Model|null
    {
        return $this->settingRepository->findByKey($key);
    }
}