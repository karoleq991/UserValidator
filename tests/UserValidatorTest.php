<?php

use PHPUnit\Framework\TestCase;
use src\UserValidator;

class UserValidatorTest extends TestCase
{
    private UserValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new UserValidator();
    }

    public function testValidateEmailWithValidEmail()
    {
        $email = "test@kpytel.com";
        $this->assertTrue($this->validator->validateEmail($email));
    }

    public function testValidateEmailWithInvalidEmail()
    {
        $email = "invalid-email";
        $this->assertFalse($this->validator->validateEmail($email));
    }

    public function testValidatePasswordWithValidPassword()
    {
        $password = "StrongPass1!";
        $this->assertTrue($this->validator->validatePassword($password));
    }

    public function testValidatePasswordWithInvalidPassword()
    {
        $password = "weak";
        $this->assertFalse($this->validator->validatePassword($password));
    }

    public function testValidatePasswordWithoutUppercase()
    {
        $password = "weakpass1!";
        $this->assertFalse($this->validator->validatePassword($password));
    }

    public function testValidatePasswordWithoutSpecialChar()
    {
        $password = "Weakpass1";
        $this->assertFalse($this->validator->validatePassword($password));
    }
}
