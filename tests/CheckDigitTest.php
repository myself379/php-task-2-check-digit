<?php

use App\CheckSum;
use App\GenerateCheckDigit;
use PHPUnit\Framework\TestCase;
use App\GenerateReferenceNumber;

class CheckDigitTest extends TestCase
{
    /** @test */
    function check_for_every_3rd_digit_starting_from_first_digit_multiply_with_3()
    {
        $checkSum = '20160513123';

        $multiply = (new CheckSum($checkSum))->everyThirdStartingFromFirst()->multiplyBy(3);

        $this->assertEquals(6, $multiply[0]);
        $this->assertEquals(18, $multiply[1]);
        $this->assertEquals(3, $multiply[2]);
    }

    /** @test */
    function check_for_every_3rd_digit_starting_from_second_digit_multiply_with_5()
    {
        $checkSum = '20160513123';

        $multiply = (new CheckSum($checkSum))->everyThirdStartingFromSecond()->multiplyBy(5);

        $this->assertEquals(0, $multiply[0]);
        $this->assertEquals(0, $multiply[1]);
        $this->assertEquals(15, $multiply[2]);
    }

    /** @test */
    function check_for_every_3rd_digit_starting_from_third_digit_multiply_with_7()
    {
        $checkSum = '20160513123';

        $multiply = (new CheckSum($checkSum))->everyThirdStartingFromThird()->multiplyBy(7);

        $this->assertEquals(7, $multiply[0]);
        $this->assertEquals(35, $multiply[1]);
        $this->assertEquals(7, $multiply[2]);
    }

    /** @test */
    function sum_for_value_A()
    {
        $checkSum = '20160513123';

        $valueA = (new CheckSum($checkSum))->everyThirdStartingFromFirst()->multiplyBy(3)->sum();

        $this->assertEquals(33, $valueA);
    }

    /** @test */
    function sum_for_value_B()
    {
        $checkSum = '20160513123';

        $valueB = (new CheckSum($checkSum))->everyThirdStartingFromSecond()->multiplyBy(5)->sum();

        $this->assertEquals(30, $valueB);
    }

    /** @test */
    function sum_for_value_C()
    {
        $checkSum = '20160513123';

        $valueC = (new CheckSum($checkSum))->everyThirdStartingFromThird()->multiplyBy(7)->sum();

        $this->assertEquals(49, $valueC);
    }

    /** @test */
    function sum_for_all_values_A_B_C()
    {
        $checkSum = '20160513123';

        $valueA = (new CheckSum($checkSum))->everyThirdStartingFromFirst()->multiplyBy(3)->sum();
        $valueB = (new CheckSum($checkSum))->everyThirdStartingFromSecond()->multiplyBy(5)->sum();
        $valueC = (new CheckSum($checkSum))->everyThirdStartingFromThird()->multiplyBy(7)->sum();

        $finalSum = $valueA + $valueB + $valueC; 

        $this->assertEquals(112, $finalSum);
    }

    /** @test */
    function test_for_the_final_check_digit()
    {
        $checkSum = '20160513123';

        $valueA = (new CheckSum($checkSum))->everyThirdStartingFromFirst()->multiplyBy(3)->sum();
        $valueB = (new CheckSum($checkSum))->everyThirdStartingFromSecond()->multiplyBy(5)->sum();
        $valueC = (new CheckSum($checkSum))->everyThirdStartingFromThird()->multiplyBy(7)->sum();

        $finalSum = $valueA + $valueB + $valueC;
        $checkDigit = (new GenerateCheckDigit($finalSum))->generate();

        $this->assertEquals(112, $finalSum);
        $this->assertEquals(4, $checkDigit);
    }

    /** @test */
    function test_for_append_generated_check_digit_to_check_sum()
    {
        $checkSum = '20160513123';

        $referenceNumber = (new GenerateReferenceNumber($checkSum))->generate();

        $this->assertEquals('201605131234', $referenceNumber);
    }

    /** @test */
    function output_for_generating_reference_number_for_543215432154321()
    {
        $checkSum = '543215432154321';

        $valueA = (new CheckSum($checkSum))->everyThirdStartingFromFirst()->multiplyBy(3)->sum();
        $valueB = (new CheckSum($checkSum))->everyThirdStartingFromSecond()->multiplyBy(5)->sum();
        $valueC = (new CheckSum($checkSum))->everyThirdStartingFromThird()->multiplyBy(7)->sum();

        $finalSum = $valueA + $valueB + $valueC;
        $checkDigit = (new GenerateCheckDigit($finalSum))->generate();
        $referenceNumber = (new GenerateReferenceNumber($checkSum))->generate();

        $this->assertSame('5432154321543219', $referenceNumber);

        $message = "\n\nGiven the number is '543215432154321'"."\n";
        $message2 = "The check digit is : ".$checkDigit."\n";
        $message3 = 'The generated referenceNumber is : '.$referenceNumber."\n\n";

        $output = $message.$message2.$message3;

        fwrite(STDERR, print_r($output, TRUE));
    }
}