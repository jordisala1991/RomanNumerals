<?php

Class RomanNumerals
{

	private $maxNumber = 3000;
	private $minNumber = 1;
	private $knownConversions = array("M"	=> 1000,
									  "CM"	=> 900,
									  "D"	=> 500,
									  "CD"	=> 400,
									  "C"	=> 100,
									  "XC"	=> 90,
									  "L"	=> 50,
									  "XL" 	=> 40,
									  "X" 	=> 10,
									  "IX" 	=> 9, 
									  "V" 	=> 5, 
									  "IV" 	=> 4,
									  "I" 	=> 1
									  );

	private function isClosestConversion($number, $value)
	{
		return ($number >= $value);
	}

	private function numberOutOfBoundaries($number)
	{
		return ($number > $this->maxNumber or $number < $this->minNumber);
	}

	private function toRomanRecursive($number) 
	{
		foreach ($this->knownConversions as $roman => $value)
		{
			if ($this->isClosestConversion($number, $value)) return $roman.$this->toRomanRecursive($number - $value);
		}
	}

	public function toRoman($number)
	{
		if ($this->numberOutOfBoundaries($number)) throw new InvalidArgumentException("Can't translate to roman: $number");
		return $this->toRomanRecursive($number);
	}

}