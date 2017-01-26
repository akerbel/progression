# progression
A script for the command line that shows whether a given sequence is a progression.

Parameters:
 - f - a sequence; ".", "," or any spaсe symbols can be used as a separator;
 - g - if was passed, the script checks a geometric progression. Otherwise it checks an arithmetical progression. Optional.

Example:
```
# Check an arithmetical progression
php progression.php -f "1 2 3 4"

# Check a geometric progression
php progression.php -f "1 2 4 8" -g
```
