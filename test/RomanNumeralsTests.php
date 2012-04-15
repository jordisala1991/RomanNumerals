<?php

require_once 'src/RomanNumerals.php';

Class RomanNumeralsTests extends PHPUnit_Framework_TestCase
{

	private $romanNumerals;

	public function setUp()
	{
		$this->romanNumerals = new RomanNumerals();
	}

	public function NumbersLessOrEqualsThan3000Provider()
	{
		return array("Number 3" 	=> array("III", 3),
					 "Number 4" 	=> array("IV", 4),
					 "Number 5" 	=> array("V", 5),
					 "Number 8" 	=> array("VIII", 8),
					 "Number 14" 	=> array("XIV", 14),
					 "Number 20" 	=> array("XX", 20),
					 "Number 23" 	=> array("XXIII", 23),
					 "Number 29" 	=> array("XXIX", 29),
					 "Number 34" 	=> array("XXXIV", 34),
					 "Number 37" 	=> array("XXXVII", 37),
					 "Number 44"	=> array("XLIV", 44),
					 "Number 49"    => array("XLIX", 49),
					 "Number 54" 	=> array("LIV", 54),
					 "Number 63" 	=> array("LXIII", 63),
					 "Number 72" 	=> array("LXXII", 72),
					 "Number 89" 	=> array("LXXXIX", 89),
					 "Number 94" 	=> array("XCIV", 94),
					 "Number 99"	=> array("XCIX", 99),
					 "Number 100" 	=> array("C", 100),
					 "Number 124" 	=> array("CXXIV", 124),
					 "Number 244" 	=> array("CCXLIV", 244),
					 "Number 295" 	=> array("CCXCV", 295),
					 "Number 325" 	=> array("CCCXXV", 325),
					 "Number 399"	=> array("CCCXCIX", 399),
					 "Number 434"	=> array("CDXXXV", 435),
					 "Number 468" 	=> array("CDLXVIII", 468),
					 "Number 499"	=> array("CDXCIX", 499),
					 "Number 500" 	=> array("D", 500),
					 "Number 524" 	=> array("DXXIV", 524),
					 "Number 644" 	=> array("DCXLIV", 644),
					 "Number 695" 	=> array("DCXCV", 695),
					 "Number 725" 	=> array("DCCXXV", 725),
					 "Number 799"	=> array("DCCXCIX", 799),
					 "Number 834"	=> array("DCCCXXXV", 835),
					 "Number 868" 	=> array("DCCCLXVIII", 868),
					 "Number 899"	=> array("DCCCXCIX", 899),
					 "Number 934"	=> array("CMXXXIV", 934),
					 "Number 999"	=> array("CMXCIX", 999),
					 "Number 1500" 	=> array("MD", 1500),
					 "Number 1524" 	=> array("MDXXIV", 1524),
					 "Number 1644" 	=> array("MDCXLIV", 1644),
					 "Number 1695" 	=> array("MDCXCV", 1695),
					 "Number 2725" 	=> array("MMDCCXXV", 2725),
					 "Number 2799"	=> array("MMDCCXCIX", 2799),
					 "Number 2834"	=> array("MMDCCCXXXV", 2835),
					 "Number 2868" 	=> array("MMDCCCLXVIII", 2868),
					 "Number 2899"	=> array("MMDCCCXCIX", 2899),
					 "Number 2934"	=> array("MMCMXXXIV", 2934),
					 "Number 2999"	=> array("MMCMXCIX", 2999),
					 "Number 3000"	=> array("MMM", 3000)
					 );
	}

	/**
	* @test
	* @dataProvider NumbersLessOrEqualsThan3000Provider
	*/
	public function IfIPassANumberLessOrEqualsThan3000IShouldRecieveHisRomanNumber($expectedResult, $givenNumber)
	{
		$this->assertEquals($expectedResult, $this->romanNumerals->toRoman($givenNumber));		
	}

	/**
	* @test
	*/
	public function IfIPassANumberGraterThan3000IShouldRecieveAnException()
	{
		try
		{
			$this->romanNumerals->toRoman(3500);
			$this->fail();
		}
		catch (InvalidArgumentException $exception)
		{
			$this->assertEquals("Can't translate to roman: 3500", $exception->getMessage());
			return;
		}
	}

	/**
	* @test
	*/
	public function IfIPassANumberLessThan1IShouldRecieveAnException()
	{
		try
		{
			$this->romanNumerals->toRoman(-50);
			$this->fail();
		}
		catch (InvalidArgumentException $exception)
		{
			$this->assertEquals("Can't translate to roman: -50", $exception->getMessage());
			return;
		}
	}

}