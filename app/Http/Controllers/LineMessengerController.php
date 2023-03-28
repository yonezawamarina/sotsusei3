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
         $http_client = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(config('services.line.access_token'));
        $bot = new \LINE\LINEBot($http_client, ['channelSecret' => config('services.line.message_channel_secret')]);

        $message = "LINE送信テスト";
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        $response = $bot->pushMessage($lineUserId, $textMessageBuilder);

        if ($response->isSucceeded()) {
            Log::info('送信成功');
        } else {
            Log::error('送信失敗: '. $response->getHTTPStatus(). ' '. $response->getRawBody());
        }
        }
    }

