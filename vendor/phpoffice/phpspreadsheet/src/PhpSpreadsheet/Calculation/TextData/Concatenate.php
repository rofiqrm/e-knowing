<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\TextData;

use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;

class Concatenate
{
    /**
     * CONCATENATE.
     */
    public static function CONCATENATE(...$args): string
    {
        $returnValue = '';

        // Loop through arguments
        $aArgs = Functions::flattenArray($args);
        foreach ($aArgs as $arg) {
            if (is_bool($arg)) {
                $arg = self::convertBooleanValue($arg);
            }
            $returnValue .= $arg;
        }

        return $returnValue;
    }

    /**
     * TEXTJOIN.
     *
     * @param mixed $delimiter
     * @param mixed $ignoreEmpty
     * @param mixed $args
     */
    public static function TEXTJOIN($delimiter, $ignoreEmpty, ...$args): string
    {
        // Loop through arguments
        $aArgs = Functions::flattenArray($args);
        foreach ($aArgs as $key => &$arg) {
            if ($ignoreEmpty === true && is_string($arg) && trim($arg) === '') {
                unset($aArgs[$key]);
            } elseif (is_bool($arg)) {
                $arg = self::convertBooleanValue($arg);
            }
        }

        return implode($delimiter, $aArgs);
    }

    /**
     * REPT.
     *
     * Returns the result of builtin function round after validating args.
     *
     * @param mixed $stringValue The value to repeat
     * @param mixed $repeatCount The number of times the string value should be repeated
     */
    public static function builtinREPT($stringValue, $repeatCount): string
    {
        $repeatCount = Functions::flattenSingleValue($repeatCount);

        if (!is_numeric($repeatCount) || $repeatCount < 0) {
            return Functions::VALUE();
        }

        if (is_bool($stringValue)) {
            $stringValue = self::convertBooleanValue($stringValue);
        }

        return str_repeat($stringValue, (int) $repeatCount);
    }

    private static function convertBooleanValue($value)
    {
        if (Functions::getCompatibilityMode() === Functions::COMPATIBILITY_OPENOFFICE) {
            return (int) $value;
        }

        return ($value) ? Calculation::getTRUE() : Calculation::getFALSE();
    }
}
