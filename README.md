# php-task-2-check-digit
Check Digit Katas

The check digit algorithm is defined as such:

Given a sequence of digits:
-	For every 3rd digit starting from first digit, multiply with "3".
	-	Add these to get value for "A".
-	For every 3rd digit starting from second digit, multiply with "5".
	-	Add these to get value for "B".
-	For every 3rd digit starting from third digit, multiply with "7".
	-	Add these to get value for "C".
-	Add A, B and C together as final sum.
-	Break down the sum into digit components and sum it up.
-	Continue reducing it to single digit.
-	The final digit is the check digit.

For example, the value "20160513123"
	2 => 2 * 3 = 6 (A)
	0 => 0 * 5 = 0 (B)
	1 => 1 * 7 = 7 (C)
	6 => 6 * 3 = 18 (A)
	0 => 0 * 5 = 0 (B)
	5 => 5 * 7 = 35 (C)
	1 => 1 * 3 = 3 (A)
	3 => 3 * 5 = 15 (B)
	1 => 1 * 7 = 7 (C)
	2 => 2 * 3 = 6 (A)
	3 => 3 * 5 = 15 (B)

	A = 6 + 18 + 3 + 6 = 33
	B = 0 + 0 + 15 + 15 = 30
	C = 7 + 35 + 7 = 49
	S = 33 + 30 + 49 = 112

	112 => 1 + 1 + 2 = 4
	
The check digit is "4".
The generated reference number is "201605131234".

