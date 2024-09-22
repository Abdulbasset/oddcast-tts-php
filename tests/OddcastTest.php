<?php


use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SergiX44\OddcastTTS\Voices;

class OddcastTest extends TestCase
{

    #[Test]
    public function it_has_a_default_voice()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $this->assertInstanceOf(\SergiX44\OddcastTTS\Voices\English\Julie_US::class, $i->getVoice());
    }

    #[Test]
    public function it_has_a_default_text()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $this->assertSame('Hello!', $i->getText());
    }

    #[Test]
    public function it_generate_the_url()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $this->assertTrue(filter_var($i->getUrl(), FILTER_VALIDATE_URL) !== false);
    }

    #[Test]
    public function it_can_download_the_audio()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $this->assertTrue($i->getAudio() !== false);
    }

    #[Test]
    public function it_can_save_the_file()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $i->save(__DIR__.'/../test.mp3');

        $this->assertFileExists(__DIR__.'/../test.mp3');

        unlink(__DIR__.'/../test.mp3');
    }

    #[Test]
    public function can_change_the_voice()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $i->setVoice(\SergiX44\OddcastTTS\Voices\Italian\Raffaele::class);

        $this->assertInstanceOf(\SergiX44\OddcastTTS\Voices\Italian\Raffaele::class, $i->getVoice());
    }

    #[Test]
    public function it_works_with_custom_text()
    {
        $i = new \SergiX44\OddcastTTS\Oddcast();

        $i->setText('World!');

        $this->assertSame('World!', $i->getText());
        $this->assertNotEmpty($i->getAudio());
    }

}