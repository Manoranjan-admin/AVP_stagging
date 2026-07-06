<?php
class NumbersToWords
{
	function convertCurrencyToWords($number) 
	{
		if(!is_numeric($number)) return false;
		$nums = explode('.', $number);
		$out = convertIntegerToWords($nums[0]).' RUPEES';
		if(isset($nums[1])) {
			if($nums[1]=='00'){
				$out .= '';
			}
			else{
				$out .= ' AND '.convertIntegerToWords($nums[1]).' PAISE';
			}
		}
		return $out;
	}
	
}

function convertIntegerToWords($x)
{
	$nwords = array(    'ZERO', 'ONE', 'TWO', 'THREE', 'FOUR', 'FIVE', 'SIX', 'SEVEN', 
	                     'EIGHT', 'NINE', 'TEN', 'ELEVEN', 'TWELVE', 'THIRTEEN', 
	                     'FOURTEEN', 'FIFTEEN', 'SIXTEEN', 'SEVENTEEN', 'EIGHTEEN', 
	                     'NINETEEN', 'TWENTY', 30 => 'THIRTY', 40 => 'FORTY', 
	                     50 => 'FIFTY', 60 => 'SIXTY', 70 => 'SEVENTY', 80 => 'EIGHTY', 
	                     90 => 'NINETY' );

	     if(!is_numeric($x)) 
	     { 
	         $w = '#'; 
	     }else if(fmod($x, 1) != 0) 
	     { 
	         $w = '#'; 
	     }else{ 
	         if($x < 0) 
	         { 
	             $w = 'MINUS '; 
	             $x = -$x; 
	         }else{ 
	             $w = ' '; 
	         } 
	         if($x < 21) 
	         { 
				 if($x <= 9 ) {$x = (int)$x; } //To resolve issue 8,914.04 USD, In Words : EIGHT THOUSAND NINE HUNDRED AND FOURTEEN RUPEES AND CENTS Only.
	             $w .= $nwords[$x]; 
	         }else if($x < 100) 
	         { 
	             $w .= $nwords[10 * floor($x/10)]; 
	             $r = fmod($x, 10); 
	             if($r > 0) 
	             { 
	                 $w .= ' - '. $nwords[$r]; 
	             } 
	         } else if($x < 1000) 
	         { 
	             $w .= $nwords[floor($x/100)] .' HUNDRED'; 
	             $r = fmod($x, 100); 
	             if($r > 0) 
	             { 
	                 $w .= ' AND '. convertIntegerToWords($r); 
	             } 
	         } else if($x < 100000) 
	         { 
	             $w .= convertIntegerToWords(floor($x/1000)) .' THOUSAND'; 
	             $r = fmod($x, 1000); 
	             if($r > 0) 
	             { 
	                 $w .= ' '; 
	                 if($r < 100) 
	                 { 
	                     $w .= ' AND '; 
	                 } 
	                 $w .= convertIntegerToWords($r); 
	             } 
	         } else { 
	             $w .= convertIntegerToWords(floor($x/100000)) .' LAKH'; 
	             $r = fmod($x, 100000); 
	             if($r > 0) 
	             { 
	                 $w .= ' '; 
	                 if($r < 100) 
	                 { 
	                     $word .= ' AND '; 
	                 } 
	                 $w .= convertIntegerToWords($r); 
	             } 
	         } 
	     } 
	     return $w; 
}
?>
