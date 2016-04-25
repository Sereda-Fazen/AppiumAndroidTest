<?php
require_once "/home/alex/vendor/autoload.php";

class AppiumVkTestsCest extends PHPUnit_Extensions_AppiumTestCase
{


    public function testAppium()
    {
        $I = $this;

        $I->byXPath('//android.widget.LinearLayout/android.widget.EditText[@text="E-mail or login"]')->value('alex');
        $I->byXPath('//android.widget.LinearLayout/android.widget.LinearLayout')->value('sereda');
        $I->byClassName('android.widget.Button')->click();
        sleep(3);
        $I->assertContains('An error occurred while trying to log in. Please check your login and password and try again.', $I->byXPath('//android.widget.ScrollView/android.widget.TextView')->text());
        $I->byXPath('//android.widget.Button[@text="OK"]')->click();

        sleep(2);
        $I->byXPath('//android.widget.LinearLayout/android.widget.EditText')->value('fazen7@mail.ru');
        $I->byXPath('//android.widget.LinearLayout/android.widget.LinearLayout')->value('fJ4qEn5YFaZeN');
        $I->byClassName('android.widget.Button')->click();
        sleep(5);
        $I->assertTrue($I->byXPath('//android.view.View/android.widget.ImageButton')->displayed());
        $I->byXPath('//android.view.View/android.widget.ImageButton')->click();
        sleep(2);
        $I->assertContains('Alexander Sereda',$I->byXPath('//android.widget.RelativeLayout/android.widget.TextView')->text());


        
        //$I->assertTrue($I->byXPath('//android.widget.TextView[@text="An error occurred while trying to log in. Please check your login and password and try again."]')->displayed());
        /*
        $I->assertTrue($I->byClassName('android.widget.TextView')->text());
        $I->byXPath('//android.widget.Button[@text="OK"]')->click();
/*
        $I->byXPath('//android.widget.TextView[@text="Next"]')->click();

        $I->byXPath('//android.widget.TextView[@text="USA"]')->click();
        $I->byXPath('//android.widget.EditText[@text="Ukraine"]')->click();
*/



        /*
       // $I->byXPath('//android.widget.LinearLayout/android.widget.FrameLayout/android.widget.ImageView')->click();
      //  $I->assertTrue($I->byId('android:id/parentPanel')->displayed());
      //  $I->byId('android:id/button1')->click();
        $I->byXPath('//android.widget.LinearLayout/android.widget.TextView[@text="USA"]')->click();
        /*
        $originate = $I->byXPath('//android.widget.ListView/android.widget.TextView[@text="Afghanistan"]');
        $destination = $I->byXPath('//android.widget.ListView/android.widget.TextView[@text="USA"]');
        $I->scroll($originate,$destination);

        $I->by('name', 'Albania')->click();

//android.widget.TextView[@text="USA"]
*/
    }

    public static $browsers = array(
        [
            'local' => true,
            'port' => 4723,
            'browserName' => '',

            'desiredCapabilities' => [

               // 'appActivity' => '.Launcher',
              //  'appPackage' => 'com.android.launcher',
                'app' => '/home/alex/PhpStormProjects/Appium/apk/VK.apk',
                'platformName' => 'Android',
                'platformVersion' => '4.1.1',
                'deviceName' => 'Android Emulator',
                'unicodeKeyboard' => 'true',
                'resetKeyboard' => 'true'
            ]
        ]
    );



}