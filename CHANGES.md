12/9/2008 Update
* removed an unused constant and renamed the constructor to use the PHP magic method __construct (thanks to Robin for locating the legacy constant and suggesting the use of the magic method).

2/19/2009 Update
* updated typical usage to show a correct example! (thanks David!)

2/24/2009 Update
* fixed typo in the usage! (thanks Adam!)

3/14/2009 Update
* added support for the iPod; added iPod and iPhone as platforms; added Google.s Android

4/22/2009 Update
* added support for GoogleBot, the W3C Validator and Yahoo! Slurp

4/27/2009 Update
* John pointed out a terrible typo (see below) . removed the typo

11/08/2009 Update
* A lot of changes to the script, thank you to everyone for the suggestions and emails. This release should add all of the requested features. Added BlackBerry, mobile detection, Opera Mini support, robot detection, Opera 10.s UserAgent .mess., detection for IceCat and Shiretoko!

3/7/2010 Update
* Version 1.7 was a *MAJOR* Rebuild (preg_match and other .slow. routine removal(s)) included the following changes:
* Almost allof Gary.s original code has been replaced
* Large PHPUNIT testing environment created to validate new releases and additions
* Added FreeBSD Platform
* Added OpenBSD Platform
* Added NetBSD Platform
* Added SunOS Platform
* Added OpenSolaris Platform
* Added support of the Iceweazel Browser
* Added isChromeFrame() call to check if chromeframe is in use
* Moved the Opera check in front of the Firefox check due to legacy Opera User Agents
* Added the __toString() method (Thanks Deano)

4/27/2010: Update (Version 1.8)
* Added iPad support

8/20/2010: Update (Version 1.9)
* Added MSN Explorer Browser
* Added Bing/MSN Robot
* Added the Android Platform
* Fixed issue with Android 1.6/2.2