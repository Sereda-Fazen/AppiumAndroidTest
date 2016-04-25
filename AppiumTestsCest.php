<?php
require_once "/home/alex/vendor/autoload.php";

class AppiumTestsCest extends PHPUnit_Extensions_AppiumTestCase
{

    public function testAppium()
    {
        $I = $this;

        $I->byId('org.telegram.messenger:id/start_messaging_button')->click();
       // $I->byXPath('//android.widget.LinearLayout/android.widget.FrameLayout/android.widget.ImageView')->click();
      //  $I->assertTrue($I->byId('android:id/parentPanel')->displayed());
      //  $I->byId('android:id/button1')->click();
        $I->byXPath('//android.widget.LinearLayout/android.widget.TextView[@text="USA"]')->click();
        /*
        $originate = $I->byXPath('//android.widget.ListView/android.widget.TextView[@text="Afghanistan"]');
        $destination = $I->byXPath('//android.widget.ListView/android.widget.TextView[@text="USA"]');
        $I->scroll($originate,$destination);
*/
        $I->by('name', 'Albania')->click();

//android.widget.TextView[@text="USA"]

    }

    public static $browsers = array(
        [
            'local' => true,
            'port' => 4723,
            'browserName' => '',

            'desiredCapabilities' => [

               // 'appActivity' => '.Launcher',
              //  'appPackage' => 'com.android.launcher',
                'app' => '/home/alex/PhpStormProjects/Appium/apk/Instagram.apk',
                'platformName' => 'Android',
                'platformVersion' => '4.1.1',
                'deviceName' => 'Android Emulator',
                'unicodeKeyboard' => 'true',
                'resetKeyboard' => 'true'
            ]
        ]
    );



}