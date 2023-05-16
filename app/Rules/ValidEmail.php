<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class ValidEmail implements Rule
{
    protected $table;
    protected $column;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validator = new EmailValidator();

        $isEmailValid = $validator->isValid($value, new RFCValidation());

        if (!$isEmailValid) {
            return false;
        }

        return \DB::table($this->table)
            ->where($this->column, $value)
            ->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid and unique email address.';
    }
}
