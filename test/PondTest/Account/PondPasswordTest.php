<?php

namespace PondTest\Account;


use PHPUnit\Framework\TestCase;
use Pond\Account\PondPassword;

/**
 * @covers \Pond\Account\PondPassword
 */
class PondPasswordTest extends TestCase
{
    public function testCreateNewUsesAHashingMechanism()
    {
        // hashing algos are a blackbox so this should at least test some
        // aspects of it (basically that hashes are somewhat random and the hash works
        // in conjunction with the  \password_verify() function)
        $password = '?1ö.,_1#dyxekq84';
        $howManyPasswordsToCreate = 100;
        $hashes = [];
        for($i = 0; $i < $howManyPasswordsToCreate; $i++) {
            $pondPw = PondPassword::createNew($password);
            $this->assertFalse(in_array($pondPw->getHash(),$hashes));
            $hashes[] = $pondPw->getHash();
            $this->asserttrue(password_verify($password, $pondPw->getHash()));
        }
    }

    public function testPasswordVerify()
    {
        $passwordOne = '89av1ACSNL^„CQ1C..1-#A+QM<Y274E';
        $passwordTwo = 'ThisAintMyPasswordISwearAnOathOnYourLife';

        $pondPwOne = PondPassword::createNew($passwordOne);
        $pondPwTwo = PondPassword::createNew($passwordTwo);

        $this->assertTrue($pondPwOne->verify($passwordOne));
        $this->assertFalse($pondPwOne->verify($passwordTwo));

        $this->assertTrue($pondPwTwo->verify($passwordTwo));
        $this->assertFalse($pondPwTwo->verify($passwordTwo));
    }
}
