<?php
namespace App\Helpers;
class Nric
{
    public static function validate($nric)
    {
        $nric = strtoupper($nric);
        if (strlen($nric) == 9) {
            $checksum = self::checksum(substr($nric, 0, 8));
            return $checksum == $nric[8];
        }
        return false;
    }
    public static function checksum($nric)
    {
        $nric = strtoupper($nric);
        if (strlen($nric) == 8) {
            $prefix = $nric[0];
            $nric = substr($nric, 1);
            $number = $nric[0] * 2 + $nric[1] * 7 + $nric[2] * 6
                + $nric[3] * 5 + $nric[4] * 4 + $nric[5] * 3
                + $nric[6] * 2;
            if ($prefix == 'T' || $prefix == 'G') {
                $number += 4;
            }
            $mod = $number % 11;
            $hash = [
                ['J', 'Z', 'I', 'H', 'G', 'F', 'E', 'D', 'C', 'B', 'A'],
                ['X', 'W', 'U', 'T', 'R', 'Q', 'P', 'N', 'M', 'L', 'K']
            ];
            if (in_array($prefix, ['S', 'T'])) {
                return $hash[0][$mod];
            } elseif (in_array($prefix, ['F', 'G'])) {
                return $hash[1][$mod];
            }
        }
    }
    public static function generateFakeNric($limit = 1, $prefixes = ['S','T','F','G'])
    {
        for ($i = 0; $i < $limit; ++$i) {
            $year = sprintf('%1$02d', mt_rand(0, 99));
            # Singapore's birth rate is less than 80000 a year.
            # If the third digit is 8 or 9, this will never hit a real NRIC.
            $number = sprintf('%1$05d', mt_rand(80000, 99999));
            $prefix = $prefixes[mt_rand(0, count($prefixes) - 1)];
            $check = self::checksum($prefix . $year . $number);
            yield $prefix . $year . $number . $check;
        }
    }
}
