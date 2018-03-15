<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Index\BaseController;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class CodeController extends BaseController
{
    function captcha()
    {
        $phrase = new PhraseBuilder;
        $num = $phrase->build(4);
        $builder = new CaptchaBuilder($num,$phrase);
        $builder->build(130,32);
        $builder->setBackgroundColor(255, 0, 0);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        $code = $builder->getPhrase();
        session(['code' => $code]);
        header("content-type:image/jpeg");
        $builder->output();
    }
}