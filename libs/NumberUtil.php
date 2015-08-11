<?php

class NumberUtil
{

    /** @var array of strings for numbers */
    static $NUMBER_NAMES = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion');

    /**
     * Return true if the provided number is even
     * @param number
     * @return boolval
     */
    public function IsEven($number)
    {
        return $number % 2 == 0;
    }

    /**
     * Return true if the provided number is odd
     * @param number
     * @return boolval
     */
    public function IsOdd($number)
    {
        return !$this->IsEven($number);
    }

    /**
     * Return a textual representation of a number
     * @param number
     * @return string
     */
    public function GetWords($number)
    {

        $this->Validate($number);

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';

        if ($number < 0) {
            return $negative . $this->GetWords(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = self::$NUMBER_NAMES[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = self::$NUMBER_NAMES[$tens];
                if ($units) {
                    $string .= $hyphen . self::$NUMBER_NAMES[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = self::$NUMBER_NAMES[$hundreds] . ' ' . self::$NUMBER_NAMES[100];
                if ($remainder) {
                    $string .= $conjunction . $this->GetWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->GetWords($numBaseUnits) . ' ' . self::$NUMBER_NAMES[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->GetWords($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = self::$NUMBER_NAMES[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    /**
     * @param number
     * @throws Exception if number is not valid
     */
    private function Validate($number)
    {
        if ($number == '') {
            throw new Exception('Number is required');
        }

        if (!is_numeric($number)) {
            throw new Exception('Numeric value is required');
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            throw new Exception('Number must be between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX);
        }
    }
}
