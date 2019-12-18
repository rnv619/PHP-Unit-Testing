<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    /** @test */
    public function change_test_method_name()
    {
        // we don't need to add test as prefix
        $this->assertTrue(true);
    }

    /**
     * This method is called before each test.
     */
    public function setUp(): void
    {
        $this->user = new \App\Models\User;
    }

    public function testThatWeCanGetTheFirstName()
    {
        $this->user->setFirstName('Rahul');

        $this->assertEquals($this->user->getFirstName(), 'Rahul');
    }

    public function testThatWeCanGetTheLastName()
    {
        $this->user->setLastName('Ranva');

        $this->assertEquals($this->user->getLastName(), 'Ranva');
    }

    public function testThatFullNameIsReturened()
    {        
        $this->user->setFirstName('Rahul');
        $this->user->setLastName('Ranva');

        $this->assertEquals($this->user->getFullName(), 'Rahul Ranva');
    }

    public function testFirstAndLastNameAreTrimmed()
    {        
        $this->user->setFirstName('    Rahul ');
        $this->user->setLastName(' Ranva     ');

        $this->assertEquals($this->user->getFirstName(), 'Rahul');
        $this->assertEquals($this->user->getLastName(), 'Ranva');
    }

    public function testEmailAddressCanSet()
    {
        $this->user->setEmail('ranva.rahul@gmail.com');
        
        $this->assertEquals($this->user->getEmail(), 'ranva.rahul@gmail.com');
    }

    public function testEmailVariablesContainsCorrectValues()
    {        
        $this->user->setFirstName('Rahul');
        $this->user->setLastName('Ranva');
        $this->user->setEmail('ranva.rahul@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Rahul Ranva');
        $this->assertEquals($emailVariables['email'], 'ranva.rahul@gmail.com');

    }
}