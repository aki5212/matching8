<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeekerPostRequest;
use App\Http\Requests\SeekerPutRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Employer; 
use App\Models\Seeker;
use App\Models\Content;

class SeekerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Seeker::class, 'Seeker');
    }

    public function index(): Response
    {
        //　求職一覧を取得
        $Seekers = Seeker::with('content')
                    ->orderBy('content_id')
                    ->orderBy('nickname')
                    ->get();

        return response()
                ->view('admin/Seeker/index', ['Seekers' => $Seekers])
                ->header('Content-Type', 'text/html')
                ->header('Content-Encoding', 'UTF-8');
    }

    public function show(Seeker $Seeker): View
    {
        Log::info('求職詳細情報が参照されました。ID=' . $Seeker->id);
        
        return view('admin/Seeker/show', compact('Seeker'));
    }

    public function create(): View
    {
        // ビューにカテゴリ一覧を表示するために全件取得
        $content = Content::all();

        // 求人一覧を表示するために全件取得
        $employer = Employer::all();

        return view('admin/seeker/create', 
            compact('contents', 'employer'));
    }

    public function store(SeekerPostRequest $request): RedirectResponse
    {
        // 求職データ登録用のオブジェクトを作成する
        $seeker = new Seeker();

        // リクエストオブジェクトからパラメータを取得
        $seeker->content_id = $request->content_id;
        $seeker->nickname = $request->nickname;
        $seeker->price = $request->price;
        $seeker->admin_id = Auth::id();

        DB::transaction(function() use($seeker, $request) {

            // 保存
            $seeker->save();

            // 求職求人テーブルを登録
            $seeker->employers()->attach($request->employer_ids);
        });
            
        // 登録完了後seeker.indexにリダイレクトする
        return redirect(route('seeker.index'))
        ->with('message', $seeker->nickname . 'を追加しました。');
    }

    public function edit(seeker $seeker): View
    {
        // カテゴリ一覧を表示するために全件取得
        $content = Content::all();

        // 求人一覧を表示するために全件取得
        $employers = Employer::all();

        // 求職に紐づく求人IDの一覧を取得
        $employerIds = $seeker->employers()->pluck('id')->all();

        return view('admin/seeker/edit', 
            compact('seeker', 'content', 'employers', 'employerIds'));
    }

    public function update(SeekerPutRequest $request, seeker $seeker):
    RedirectResponse
    {
        // リクエストオブジェクトからパラメータを取得する
        $seeker->content_id = $request->content_id;
        $seeker->nickname = $request->nickname;
        $seeker->price = $request->price;

        DB::transaction(function() use($seeker, $request) {

            // 更新
            $seeker->update();

            // 求職と求人の関連付けを更新する
            $seeker->employer()->sync($request->employer_ids);
        });

        return redirect(route('seeker.index'))
            ->with('message', $seeker->nickname . 'を変更しました。');
    }

    public function destroy(seeker $seeker): RedirectResponse
    {
        // 削除
        $seeker->delete();
        
        return redirect(route('seeker.index'))
            ->with('message', $seeker->nickname . 'を削除しました。');
    }
}
