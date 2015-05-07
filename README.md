Browser.php
=============

Helps detect the user's browser and platform at the PHP level via the user agent

I have decided to fork [Chris Schuld's Browser.php](https://github.com/cbschuld/Browser.php) library and to do some major improvements. This is currently a work in progress. Any development will be done in the "Dev" branch, and will eventually be merged into the master branch.


Installation
============

To install, simply `require` the `Browser.php` file under `lib`. 

You can also install it via `Composer` by using the [Packagist archive](https://packagist.org/packages/cbschuld/browser.php).


Background
============

Detecting the user's browser type and version is helpful in web applications that harness some of the newer bleeding edge concepts. With the browser type and version you can notify users about challenges they may experience and suggest they upgrade before using such application. Not a great idea on a large scale public site; but on a private application this type of check can be helpful.

In an active project of mine we have a pretty graphically intensive and visually appealing user interface which leverages a lot of transparent PNG files. Because we all know how great IE6 supports PNG files it was necessary for us to tell our users the lack of power their browser has in a kind way.

Searching for a way to do this at the PHP layer and not at the client layer was more of a challenge than I would have guessed; the only script available was written by Gary White and Gary no longer maintains this script because of reliability. I do agree 100% with Gary about the readability; however, there are realistic reasons to desire the user.s browser and browser version and if your visitor is not echoing a false user agent we can take an educated guess.

I based this solution off of Gary White.s original solution but added a few things:

I added the ability to view the return values as class constants to increase the readability
