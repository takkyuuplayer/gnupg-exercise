<?php

use PHPUnit\Framework\TestCase;

class Crypt_GPGTest extends TestCase
{
    protected $gpg;

    public function setUp(): void
    {
        $this->gpg = new Crypt_GPG(
            [
                'homedir' => __DIR__ . '/' . '../.gnupg',
            ]
        );
    }
    public function testDecryptV1()
    {
        $this->gpg->addDecryptKey('4085C7CB375C113A75EAFBFD7BBC032B13B2334A', 'password');
        $expected = file_get_contents(__DIR__ . '/' . '../gpg1/version');
        $encrypted = file_get_contents(__DIR__ . '/' . '../gpg1/version.gpg');

        $results = $this->gpg->decryptAndVerify($encrypted);

        $this->assertSame($expected, $results['data']);
    }

    public function testDecryptV2()
    {
        $this->gpg->addDecryptKey('2716CABEE759084DAB3904F29D64786A22987C48', 'password');
        $expected = file_get_contents(__DIR__ . '/' . '../gpg2/version');
        $encrypted = file_get_contents(__DIR__ . '/' . '../gpg2/version.gpg');

        $results = $this->gpg->decryptAndVerify($encrypted);

        $this->assertSame($expected, $results['data']);
    }
}
