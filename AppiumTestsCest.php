<?php
require_once "/home/alex/vendor/autoload.php";

class AndroidDemoTests extends PHPUnit_Extensions_AppiumTestCase
{

    public function testDemo()
    {
        $I = $this;
        $I->byId('ru.livemaster:id/collage_image_0')->click(); // открываем раздел каталога Одежда
        $I->assertRegExp('/Одежда/i', $I->byXPath('//android.view.View[@resource-id="ru.livemaster:id/toolbar"]/android.widget.TextView')->text()); // проверяем что находимся в нужном разделе
        $firstWork = $I->byXPath('//android.widget.ListView[@resource-id="ru.livemaster:id/lvWorks"]/android.widget.RelativeLayout[1]/android.widget.LinearLayout/android.widget.TextView[1]')->text(); // берем название первой работы
        $I->byXPath('//android.widget.ListView[@resource-id="ru.livemaster:id/lvWorks"]/android.widget.RelativeLayout[1]')->click(); // переходим к первой работе
        $I->assertEquals($firstWork, $I->byId('ru.livemaster:id/work_title')->text()); // проверяем что находимся в первой работе
        $I->assertTrue($I->byId('ru.livemaster:id/add_to_cart')->displayed()); // проверяем что есть кнопка В корзину
        $I->byId('ru.livemaster:id/add_to_cart')->click(); // нажимаем кнопку В корзину
        $I->assertRegExp('/В корзине/i', $I->byId('ru.livemaster:id/add_to_cart')->text()); // проверяем что кнопка В корзину изменилась на В корзине
        $I->byId('ru.livemaster:id/cart_menu')->click(); // переходим в корзину нажав на значек
        $I->assertRegExp('/Корзина/i', $I->byXPath('//android.view.View[@resource-id="ru.livemaster:id/toolbar"]/android.widget.TextView')->text()); // проверяем что находимся в корзине
        $I->assertEquals($firstWork, $I->byId('ru.livemaster:id/work_name_cart')->text()); // проверяем что в корзине есть выбранная работа
        $I->execUIA('new UiScrollable(new UiSelector().resourceId("ru.livemaster:id/cart_scroll")).flingForward();'); // скролл вниз
        $I->assertRegExp('/Оформить покупку/i', $I->byId('ru.livemaster:id/button_checkout')->text()); // проверяем наличе кнопки Оформить покупку
        $I->execUIA('new UiScrollable(new UiSelector().resourceId("ru.livemaster:id/cart_scroll")).flingBackward();'); // скролл вверх 
        $I->tap(2, $I->byId('ru.livemaster:id/lv_master_items'), 800);  // тапаем с малой задержкой (0,8 сек) на работу
        $I->assertTrue($I->byId('ru.livemaster:id/delete')->displayed());  // проверяем что появился значек удаления
        $I->byId('ru.livemaster:id/delete')->click(); // нажимаем на значек удаления
        $I->assertRegExp('/Убрать из корзины?/i', $I->byId('android:id/message')->text()); // проверяем что появилось диалоговое окно удаления
        $I->assertTrue($I->byId('android:id/button1')->displayed()); // проверяем наличие кнопки Да
        $I->byId('android:id/button1')->click(); // нажимаем кнопку Да
        $I->assertTrue($I->byId('ru.livemaster:id/imageview_cart_empty')->displayed()); // проверяем наличие картинки что карзина пуста
        $I->assertRegExp('/Начать покупки/i', $I->byId('ru.livemaster:id/button_start_shopping')->text()); // проверяем наличие кнопки с тектом Начать покупки
        sleep(5);
    }

    public static $browsers = array(
        [
            'local' => true,
            'port' => 4444,
            'browserName' => 'Android',
            'desiredCapabilities' => [
                //'app' => '/var/android/dev/app/LiveMaster.apk',
                'platformName' => 'Android',
                'platformVersion' => '4.4',
                'deviceName' => 'Android Emulator',
                'unicodeKeyboard' => 'true',
                'resetKeyboard' => 'true'
            ]
        ]
    );
}