<?php

namespace App\Http\Controllers;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;//LINE追加
use LINE\LINEBot;//LINE追加
use App\Models\User;//LINE追加
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;//LINE追加
use Illuminate\Http\Request;

class LineMessengerController extends Controller
{
       public function webhook(Request $request) {
        // LINEから送られた内容を$inputsに代入
        
        
        return 'ok';
        }
    }

