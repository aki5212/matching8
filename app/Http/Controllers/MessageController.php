<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\view\View;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(): View
    {
        // メッセージテーブルのレコードを全件取得
        $messages = Message::all();

        // messagesというキーで、ビューへ渡す
        return view('message/index', ['messages' => $messages]);
    }

    public function store(Request $request): RedirectResponse
    {
        // バリデーションを追加
        $validated = $request->validate([
            'body' => 'required|string|max:255',
        ]);

        // リクエストからボディを取得し、保存
        $message = new Message();
        $message->body = $request->body;
        $message->save();

        // 処理後、リダイレクト
        return redirect('/messages');
    }

}
