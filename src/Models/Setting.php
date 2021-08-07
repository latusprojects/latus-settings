<?php


namespace Latus\Settings\Models;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'key', 'value', 'value_long',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $attributes = [
        'value_long' => ''
    ];

    public function getValue()
    {
        return $this->value ?? $this->value_long;
    }

    public function setValue(string $value)
    {
        if (strlen($value) <= 255) {
            $this->value_long = '';
            $this->value = $value;
            return;
        }
        $this->value = null;
        $this->value_long = $value;
    }

}