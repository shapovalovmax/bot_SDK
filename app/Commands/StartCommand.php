<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Запуск / Перезапуск бота';

    public function handle()
    {
        $latitude = '50.362366';
        $longitude = '29.343679';
        $stickerId = 'CAADAgADOQADfyesDlKEqOOd72VKAg';
        $sticker_url = "https://www.gstatic.com/webp/gallery/1.webp";

        $message = '<b>жирный текст</b>'
            . PHP_EOL .'<i>курсивный текст</i>'
            . PHP_EOL .'<u>подчеркнутный текст</u>'
            . PHP_EOL .'<s>перечеркнутный текст</s>'
            . PHP_EOL .'<span class="tg-spoiler">Какой то спойлер Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, voluptate!</span>'
            . PHP_EOL .'<b>жирный текст <i>еще и курсивный <s>еще и перечеркнутый </s></i></b>'
            . PHP_EOL .'<a href="http://www.example.com/">Ссылка в текстом</a>'
            . PHP_EOL .'<a href="tg://user?id=264493118">упоминание пользователя</a>'
            . PHP_EOL .'<code>код фиксированной ширины</code>'
            . PHP_EOL .'<pre>предварительно отформатированный блок кода фиксированной ширины</pre>'
            . PHP_EOL .'<pre><code class="language-python">предварительно отформатированный блок кода фиксированной ширины, написанный на языке программирования Python</code></pre>'
        ;
//        $this->replyWithMessage([
//            'text' => $message,
//            'parse_mode' => 'HTML'
//        ]);
//        $this->replyWithLocation([
//            'latitude' => $latitude,
//            'longitude' => $longitude,
//        ]);
        $this->replyWithSticker([
            'sticker' => $stickerId,
        ]);
    }
}
