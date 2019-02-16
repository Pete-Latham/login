# README

_16th Feb_

- Refactored `index.php` so that whole site is now using `includes()` to pull in html code as required.
- Moved database connect code into `/helpers` to help separate concerns. Will find more code that's repeated and do the same.
- Added a port test to `db_connect.php` so code would work with my Laragon install for development and a standard MySQL installation

Next:- message stack implementation
