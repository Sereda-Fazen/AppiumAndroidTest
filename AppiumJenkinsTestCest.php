<?php
require_once "/home/alex/vendor/autoload.php";

class AppiumJenkinsTestCest extends PHPUnit_Extensions_AppiumTestCase
{


    public function testJenkins()
    {
        $I = $this;

        $I->byXPath('//android.widget.Button[@text="Disable Logs"]')->click();

        /**
         * Login
         */

        $I->byXPath('//android.widget.TextView[@text="Add account"]')->click();
        $I->byXPath('//android.widget.LinearLayout[1]//android.widget.EditText[@text="Jenkin installation URL"]')->value('jenkins.cadencewatch.com');
        $I->byXPath('//android.widget.LinearLayout[3]//android.widget.EditText')->value('vanya');
        $I->byXPath('//android.widget.LinearLayout[4]//android.widget.EditText')->value('43terminal59Pass');
        $I->byXPath('//android.widget.Button[@text="Login"]')->click();
        sleep(3);
        $I->assertContains('Jobs',$I->byXPath('//android.widget.LinearLayout/android.widget.TextView')->text());

        /**
         *  Check vanya@
         */

        $I->byXPath('//android.widget.FrameLayout/android.widget.ImageView')->click();
        sleep(2);
        $I->assertContains('vanya@',$I->byXPath('//android.widget.RelativeLayout/android.widget.LinearLayout/android.widget.TextView')->text());

        /**
         * Settings (Green ball)
         */

        $I->byXPath('//android.widget.ListView/android.widget.RelativeLayout[7]//android.widget.TextView[@text="Settings"]')->click();
        sleep(2);
        $I->byXPath('//android.widget.ListView/android.widget.LinearLayout[1]/android.widget.LinearLayout/android.widget.CheckBox')->click();
        $I->byXPath('//android.widget.FrameLayout/android.widget.ImageView')->click();


        /**
         * Return main page
         */

        sleep(2);
        $I->byXPath('//android.widget.ListView/android.widget.RelativeLayout/android.widget.TextView[@text="Jobs"]')->click();
        sleep(3);


        /**
         * Main Page
         */
        $I->byXPath('//android.view.View/android.widget.LinearLayout/android.widget.TextView[2]')->click();
        sleep(1);
        $I->byXPath('//android.widget.LinearLayout/android.widget.ListView/android.widget.CheckedTextView[2]')->click();


        /**
         * Check search
         */
        $I->byXPath('//android.view.View/android.widget.LinearLayout/android.widget.TextView[1]')->click();
        $I->byName('Search query')->value('CadenceTests');
        $I->assertContains('CadenceTests',$I->byXPath('//android.widget.ListView/android.widget.RelativeLayout/android.widget.TextView')->text());
        $I->byName('Clear query')->click();
        $I->assertTrue($I->byXPath('//android.widget.ListView')->displayed());

        /**
         *  Cadence8134
         */

        $I->byXPath('//android.widget.ListView/android.widget.RelativeLayout/android.widget.TextView[@text="Cadence8134"]')->click();
        sleep(3);
        $I->assertContains('Build stability:', $I->byName('Build stability: 4 out of the last 5 builds failed.')->text());
        $I->byName('Latest artifacts')->click();
        $I->assertContains('No artifacts available for this job',$I->byName('No artifacts available for this job')->text());
        $I->byName('Builds')->click();
        $I->assertTrue($I->byXPath('//android.widget.ListView')->displayed());
        // $I->byName('Job details')->click();
        $I->byXPath('//android.widget.ListView/android.widget.RelativeLayout[4]//android.widget.TextView')->click();
        sleep(4);
        $I->assertContains('Started by user anonymous', $I->byXPath('//android.widget.ExpandableListView/android.widget.RelativeLayout/android.widget.TextView[2]')->text());
        $I->byName('Test results')->click();
        $I->assertContains('Passed: 3', $I->byXPath('//android.widget.LinearLayout/android.widget.ToggleButton[3]')->text());
        $I->byName('Console output')->click();

        $I->byXPath('//android.view.View/android.widget.LinearLayout[2]//android.widget.TextView')->click();
        $I->assertContains('Started by user anonymous', $I->byXPath('//android.widget.ListView/android.widget.LinearLayout/android.widget.TextView')->text());
        $I->byXPath('//android.view.View/android.widget.LinearLayout[2]//android.widget.TextView')->click();
        $I->assertContains('Finished: SUCCESS ', $I->byName('Finished: SUCCESS ')->text());
    }

    public static $browsers = array(
        [
            'local' => true,
            'port' => 4723,
            'browserName' => '',

            'desiredCapabilities' => [

                //'appActivity' => '.Dropbox',
               // 'appPackage' => 'com.android.dropbox',
                'app' => '/home/alex/PhpStormProjects/Appium/apk/Jenkins.apk',
                'platformName' => 'Android',
                'platformVersion' => '4.2.2',
                'deviceName' => 'Android Emulator',
                'unicodeKeyboard' => 'true',
                'resetKeyboard' => 'true'
            ]
        ]
    );



}