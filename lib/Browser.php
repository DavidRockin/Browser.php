<?php

/**
 * Browser.php - A PHP browser detection library
 *
 * Copyright (C) 2008-2010 Chris Schuld  (chris@chrisschuld.com)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details at:
 * http://www.gnu.org/copyleft/gpl.html
 *
 * User Agents Sampled from: http://www.useragentstring.com/
 *
 * This implementation is based on the original work from Gary White
 * http://apptools.com/phptools/browser/
 *
 * @author  Chris Schuld (http://chrisschuld.com/)
 * @author  David Tkachuk (http://davidrockin.com/)
 * @package PegasusPHP
 * @version 2.0
 * @todo    Major improvements to this library, todo list by precedence
 *          - Re-add the removed browser agents (IE, Opera, Safari, AOL, Mozilla, Nokia)
 *          - Add bot/crawlers detection
 *          - Determine device type (mobile, desktop, tablet, etc)
 *          - OS Version & other system info (some send CPU info)
 *          - Browser information? (ie: HTML5 support, etc)
 */

class Browser
{

    const VERSION_UNKNOWN = 'Unknown';

    // browsers
    const BROWSER_UNKNOWN = 'Unknown';
    //const BROWSER_OPERA = 'Opera';
    //const BROWSER_OPERA_MINI = 'Opera Mini';
    const BROWSER_WEBTV = 'WebTV';
    //const BROWSER_IE = 'Internet Explorer';
    //const BROWSER_POCKET_IE = 'Pocket Internet Explorer';
    const BROWSER_KONQUEROR = 'Konqueror';
    const BROWSER_ICAB = 'iCab';
    const BROWSER_OMNIWEB = 'OmniWeb';
    const BROWSER_FIREBIRD = 'Firebird';
    const BROWSER_FIREFOX = 'Firefox';
    const BROWSER_ICEWEASEL = 'Iceweasel';
    const BROWSER_SHIRETOKO = 'Shiretoko';
    //const BROWSER_MOZILLA = 'Mozilla';
    const BROWSER_AMAYA = 'Amaya';
    const BROWSER_LYNX = 'Lynx';
    const BROWSER_SAFARI = 'Safari';
    //const BROWSER_IPHONE = 'iPhone';
    //const BROWSER_IPOD = 'iPod';
    //const BROWSER_IPAD = 'iPad';
    const BROWSER_CHROME = 'Chrome';
    //const BROWSER_ANDROID = 'Android';
    //const BROWSER_GOOGLEBOT = 'GoogleBot';
    //const BROWSER_SLURP = 'Yahoo! Slurp';
    //const BROWSER_W3CVALIDATOR = 'W3C Validator';
    const BROWSER_BLACKBERRY = 'BlackBerry';
    const BROWSER_ICECAT = 'IceCat';
    //const BROWSER_NOKIA_S60 = 'Nokia S60 OSS Browser';
    //const BROWSER_NOKIA = 'Nokia Browser';
    //const BROWSER_MSN = 'MSN Browser';
    //const BROWSER_MSNBOT = 'MSN Bot';
    //const BROWSER_BINGBOT = 'Bing Bot';
    //const BROWSER_NETSCAPE_NAVIGATOR = 'Netscape Navigator';
    const BROWSER_GALEON = 'Galeon';
    const BROWSER_NETPOSITIVE = 'NetPositive';
    const BROWSER_PHOENIX = 'Phoenix';

    // platforms
    const PLATFORM_UNKNOWN     = 'Unknown';
    const PLATFORM_WINDOWS     = 'Windows';
    const PLATFORM_WINDOWS_CE  = 'Windows CE';
    const PLATFORM_APPLE       = 'Apple';
    const PLATFORM_LINUX       = 'Linux';
    const PLATFORM_OS2         = 'OS/2';
    const PLATFORM_BEOS        = 'BeOS';
    const PLATFORM_IPHONE      = 'iPhone';
    const PLATFORM_IPOD        = 'iPod';
    const PLATFORM_IPAD        = 'iPad';
    const PLATFORM_BLACKBERRY  = 'BlackBerry';
    const PLATFORM_NOKIA       = 'Nokia';
    const PLATFORM_FREEBSD     = 'FreeBSD';
    const PLATFORM_OPENBSD     = 'OpenBSD';
    const PLATFORM_NETBSD      = 'NetBSD';
    const PLATFORM_SUNOS       = 'SunOS';
    const PLATFORM_OPENSOLARIS = 'OpenSolaris';
    const PLATFORM_ANDROID     = 'Android';

    // device types
    const DEVICE_DESKTOP = "Desktop";
    const DEVICE_MOBILE  = "Mobile";
    const DEVICE_TABLET  = "Tablet";
    const DEVICE_UNKNOWN = "Unknown";

    private $agent         = '';
    public $browserName    = self::BROWSER_UNKNOWN;
    public $browserVersion = self::VERSION_UNKNOWN;
    public $platform       = self::PLATFORM_UNKNOWN;

    /**
     * @todo Allow regex and parts to only accept strings instead of arrays
     */
    protected $browsers = [
        self::BROWSER_FIREFOX => [
            "parts" => [
                "Mozilla",
            ],
            "regex" => [
                "/Firefox[\/ \(](?P<version>([^ ;\)]+))/i",
                "/Firefox$/is",
            ],
        ],
        self::BROWSER_CHROME => [
            "parts" => [
                "Chrome",
            ],
            "regex" => [
                "/Chrome[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_SAFARI => [
            "parts" => [
                "Safari",
            ],
            "regex" => [
                "/Version[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_BLACKBERRY => [
            "parts" => [
                "BlackBerry",
            ],
            "regex" => [
                "/Version[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_WEBTV => [
            "regex" => [
                "/WebTV[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_NETPOSITIVE => [
            "regex" => [
                "/NetPositive[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_GALEON => [
            "regex" => [
                "/Galeon[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_KONQUEROR => [
            "regex" => [
                "/Konqueror[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_ICAB => [
            "regex" => [
                "/iCab[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_OMNIWEB => [
            "regex" => [
                "/OmniWeb[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_PHOENIX => [
            "regex" => [
                "/Phoenix[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_FIREBIRD => [
            "regex" => [
                "/Firebird[\/ ](?P<version>([^ ;\)]+))/i"
            ],
        ],
        self::BROWSER_SHIRETOKO => [
            "regex" => [
                "/Shiretoko[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_ICECAT => [
            "regex" => [
                "/IceCat[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_ICEWEASEL => [
            "regex" => [
                "/Iceweasel[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_LYNX => [
            "regex" => [
                "/Lynx[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
        self::BROWSER_AMAYA => [
            "regex" => [
                "/amaya[\/ ](?P<version>([^ ;\)]+))/i",
            ],
        ],
    ];

    protected $platforms = [
        self::PLATFORM_WINDOWS     => ["win", "windows"],
        self::PLATFORM_APPLE       => "mac",
        self::PLATFORM_LINUX       => "Linux",

        self::PLATFORM_BEOS        => "BeOS",
        self::PLATFORM_OS2         => "OS\/2",
        self::PLATFORM_SUNOS       => "SunOS",
        self::PLATFORM_OPENSOLARIS => "OpenSolaris",
        self::PLATFORM_NETBSD      => "NetBSD",
        self::PLATFORM_OPENBSD     => "OpenBSD",
        self::PLATFORM_FREEBSD     => "FreeBSD",

        self::PLATFORM_BLACKBERRY  => "BlackBerry",
        self::PLATFORM_NOKIA       => "Nokia",
        self::PLATFORM_ANDROID     => "Android",
        self::PLATFORM_IPOD        => "iPod",
        self::PLATFORM_IPAD        => "iPad",
        self::PLATFORM_IPHONE      => "iPhone",
    ];

    public function __construct($userAgent = null)
    {
        $this->agent = (!empty($userAgent) ? $userAgent : (
        					isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ""));
        $this->determine();
    }

    protected function determine()
    {
        $this->checkBrowser();
        $this->checkPlatform();
    }

    private function checkBrowser()
    {
        // iterate through the browser agents
        foreach ($this->browsers as $browser => $value) {
            if (!empty($value['parts']) && !$this->stringContains($this->agent, $value['parts']))
                continue;

            foreach($value['regex'] as $regexp) {
                if (preg_match($regexp, $this->agent, $matches)) {
                    if (isset($matches['version']))
                        $this->browserVersion = $matches['version'];
                    $this->browserName = $browser;
                    break 2;
                }
            }
        }
    }

    /**
     * @todo Add platform version/type (ie: Mac OSX, Windows 7, Ubuntu, etc)
     */
    private function checkPlatform()
    {
        foreach ($this->platforms as $platform => $checks) {
            foreach ((array)$checks as $platformCheck) {
                if (stripos($this->agent, $platformCheck) !== false) {
                    $this->platform = $platform;
                    break 2;
                }
            }
        }
    }

    private function stringContains($needle, array $haystack)
    {
        foreach ($haystack as $value) {
            return (stripos($needle, $value) !== false);
        }
        return false;
    }

}
