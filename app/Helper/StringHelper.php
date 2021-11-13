<?php

namespace App\Helper;

class StringHelper
{

    public static function ErrorMessageHelper($field, $rule)
    {
        $ruleArray = explode(':', $rule);

        switch ($ruleArray[0]) {
            case 'required':
                return "{$field} harus diisi";
            case 'min':
                return "Minimum karakter untuk {$field} adalah {$ruleArray[1]}";
            case 'max':
                return "Maksimum karakter untuk {$field} adalah {$ruleArray[1]}";
            case 'unique':
                $cond = explode(',', $ruleArray[1]);
                $objName = $cond[0];
                $fieldName = $cond[1];
                return "Data {$objName} dengan {$fieldName} sudah ada";
            case 'confirmed':
                $field = ucfirst($field);
                return "{$field} berbeda dengan field konfirmasi {$field}";
            case 'email':
                return "Format {$field} tidak valid";
            default:
                return "input salah";
        }
    }
}
