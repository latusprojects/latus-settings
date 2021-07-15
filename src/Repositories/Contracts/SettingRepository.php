<?php


namespace Latus\Settings\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;
use Latus\Repositories\Contracts\Repository;
use Latus\Settings\Models\Setting;

interface SettingRepository extends Repository
{

    public function __construct(Setting $setting);

    public function delete(Setting $setting);

    public function getValue(Setting $setting): string;

    public function setValue(Setting $setting, string $value);

    public function findByKey(string $key): Model|null;
}