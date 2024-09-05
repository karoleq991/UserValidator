<?php

class UserValidator
{
    public function validateEmail(string $email): bool
    {
        $regex = '/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
      
        return (bool)preg_match($regex, $email);
    }

    public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }

        $hasUppercase = preg_match('/[A-Z]/', $password);
        $hasLowercase = preg_match('/[a-z]/', $password);
        $hasDigit = preg_match('/[0-9]/', $password);
        $hasSpecialChar = preg_match('/[\W_]/', $password);

        return $hasUppercase && $hasLowercase && $hasDigit && $hasSpecialChar;
    }
}

