<?php


namespace Latus\Plugins\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Latus\Settings\Models\Setting;
use Latus\Settings\Repositories\Contracts\SettingRepository as SettingRepositoryContract;
use Latus\Repositories\EloquentRepository;

class SettingRepository extends EloquentRepository implements SettingRepositoryContract
{

    public function __construct(Setting $setting)
    {
        parent::__construct($setting);
    }


    public function delete(Setting $setting)
    {
        $setting->delete();
    }

    public function getValue(Setting $setting): string
    {
        return $setting->getValue();
    }

    public function setValue(Setting $setting, string $value)
    {
        $setting->setValue($value);
    }

    public function findByKey(string $key): Model|null
    {
        return Setting::where('key', $key)->first();
    }
}