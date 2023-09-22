<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkThreeReferrals implements Rule
{
    public function passes($attribute, $value)
    {
        // Explode the referral codes into an array
        $referralCodes = explode(',', $value);

        // Count the occurrences of each referral code
        $occurrences = array_count_values($referralCodes);

        // Check if any referral code occurs more than 3 times (up to 4 times)
        foreach ($occurrences as $count) {
            if ($count > 3) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'The referral code must not be repeated more than 3 times.';
    }
}
