<?php

Class RomanNumerals
{

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

	public function toRoman($number) 
	{
		if ($number > 0)
		{
			foreach ($this->knownConversions as $roman => $value)
			{
				if ($number >= $value) return $roman.$this->toRoman($number - $value);
			}
		}
	}

}