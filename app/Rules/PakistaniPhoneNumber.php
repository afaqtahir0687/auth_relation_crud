<?php

// app/Rules/PakistaniPhoneNumber.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PakistaniPhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Regular expression to match Pakistani phone numbers.
        // Modify this regex pattern as needed.
        $pattern = '/^(?:\+92|0)[1-9]\d{9}$/';

        return preg_match($pattern, $value);
    }

    public function message()
    {
        return 'The phone number must be a valid Pakistani phone number.';
    }
}



?>