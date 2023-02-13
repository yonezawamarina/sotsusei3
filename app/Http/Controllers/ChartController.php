<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * チャートデータを取得
     */
    public function chartGet()
    {
        // 固定データを返却。DBからデータを取得すると良い
        return [12, 19, 31];
    }
}