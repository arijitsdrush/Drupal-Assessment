# Drupal Developer Questions

## Question 1
A client has called and said that they're noticing performance problems on their database when searching for a user by email address. You've checked, and the following query is running:

```
SELECT * FROM users WHERE email = 'user@test.com';
```

You run the EXPLAIN command and get the following results:

```
+----+-------------+-------+------+---------------+------+---------+------+-------+-------------+
| id | select_type | table | type | possible_keys | key  | key_len | ref  | rows  | Extra       |
+----+-------------+-------+------+---------------+------+---------+------+-------+-------------+
|  1 | SIMPLE      | users | ALL  | NULL          | NULL | NULL    | NULL | 10320 | Using where |
+----+-------------+-------+------+---------------+------+---------+------+-------+-------------+
```

Offer a theory as to why the performance is slow.

## Answer 1
Looks like the `users` table has 10320 duplicate data for a single record and that caused the problem. 


## Question 2
You're given a sorted index array that contians no keys. The array contains only integers, and your task is to identify whether or not the integer you're looking for is in the array. Write a function that searches for the integer and returns true or false based on whether the integer is present. Describe how you arrived at your solution.


## Question 3
During a large data migration, you get the following error: Fatal error: Allowed memory size of 134217728 bytes exhausted (tried to allocate 54 bytes). You've traced the problem to the following snippet of code:

```php

$stmt = $pdo->prepare('SELECT * FROM largeTable');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $result) {
	// manipulate the data here
}
```
Refactor this code so that it stops triggering the memory error.


## Question 4
Write drupal module that interact with db get data and display it.


## Question 5
In production, we'll be caching to memcache. On staging, we'll be caching to APC. In development, we won't be caching at all. Design a library that allows you to store and retrieve data from the cache (only two methods required) and fits the requirements of all three environments. Consider making use of anything appropriate (e.g. traits, classes, interfaces, abstract classes, closures, etc) to solve this problem.

Note: This is an architecture question. Please focus on the design of your library, rather than implementation or the specific caches I've described.


## Question 6
Write a complete set of unit tests for the following code:

```php

function fizzBuzz($start = 1, $stop = 100)
{
	$string = '';
	
	if($stop < $start || $start < 0 || $stop < 0) {
		throw new InvalidArgumentException;
	}
	
	for($i = $start; $i <= $stop; $i++) {
		if($i % 3 == 0 && $i % 5 == 0) {
			$string .= 'FizzBuzz';
			continue;
		}
		
		if($i % 3 == 0) {
			$string .= 'Fizz';
			continue;
		}
		
		if ($i % 5 == 0) {
			$string .= 'Buzz';
			continue;
		}
		
		$string .= $i;
	}
	
	return $string;
}
```


## Question 7
I've developed a class called Select to represent the SELECT statements I'd normally write for a database. I want to be able to use the Select objects as queries and automatically cast them to strings, but when I use them in PDOStatement::execute() I get the following error: Catchable fatal error: Object of class Select could not be converted to string. What should I change in my Select class so that this error goes away?


## Question 8
Did you work in Drupal headless project before? if yes please explain challenges you faced.