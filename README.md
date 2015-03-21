# Regular

This library is an object oriented wrapper around the PHP regular expression function `preg_match`.

### Examples

```js
$haystack = "Can a url be detected inside this string? Who knows! www.nourdine.net... maybe so?!";
$regexp = new regular\Regular("/www.([a-z]{1,}).(com|net|org)/");
$match = $regexp->match($haystack);
$whole = $match->getWholeMatch();
$domainName = $match->getCaptured(0);
$domainExtension = $match->getCaptured(1);
```

The `match` variable contains an instance of `regular\Match` which we can use to obtain the actual whole match and the capturing groups, if any (see example above). 

In turn `Match::getWholeMatch` and `Match::getCaptured` return an instance of `regular\Group` which gives us access to the value of the match (being it a whole one or a sub-group) and its offeset:

```php
$whole->getValue(); // www.nourdine.net
$whole->getOffset(); // 53
$domainName->getValue(); // nourdine
$domainName->getOffset(); // 57
echo $domainExtension->getValue(); // net
echo $domainExtension->getOffset(); // 68
```




