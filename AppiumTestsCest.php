<?php
require_once "/home/alex/vendor/autoload.php";

class AppiumTestsCest extends PHPUnit_Extensions_AppiumTestCase
{

    public function testAppium()
    {
        $I = $this;
        $I->byId('org.telegram.messenger:id/start_messaging_button')->click();
        $I->waitUntil(3);
        $I->byXPath('//android.widget.ImageView[@class=""]');
        $I->waitUntil(3);

//android.widget.TextView[@text="Widgets"]

    }

    public static $browsers = array(
        [
            'local' => true,
            'port' => 4723,
            'browserName' => '',
            'desiredCapabilities' => [

               // 'appActivity' => '.Launcher',
              //  'appPackage' => 'com.android.launcher',
                'app' => '/home/alex/PhpStormProjects/Appium/apk/telegram.apk',
                'platformName' => 'Android',
                'platformVersion' => '4.4',
                'deviceName' => 'Android Emulator',
                'unicodeKeyboard' => 'true',
                'resetKeyboard' => 'true'
            ]
        ]
    );
}