<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // フォームからのデータをモデルに保存
        Property::create($request->all());

        return redirect('/')->with('success', '物件が追加されました');
    }


    public function index(Request $request)
    {
        // クエリログの有効化
        DB::enableQueryLog();

        // プロパティモデルのクエリビルダーを作成
        $query = Property::query();

        // 公開ステータスの絞り込み
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 所在地の絞り込み
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // 間取りの絞り込み
        if ($request->filled('layouts')) {
            $query->whereIn('layout', $request->layouts);
        }

        // 賃料の絞り込み
        if ($request->filled('rent_min') && is_numeric($request->rent_min)) {
            $query->where('rent', '>=', $request->rent_min);
        }

        if ($request->filled('rent_max') && is_numeric($request->rent_max)) {
            $query->where('rent', '<=', $request->rent_max);
        }

        // 専有面積の絞り込み
        if ($request->filled('floor_area_min') && is_numeric($request->floor_area_min)) {
            $query->where('floor_area', '>=', $request->floor_area_min);
        }

        if ($request->filled('floor_area_max') && is_numeric($request->floor_area_max)) {
            $query->where('floor_area', '<=', $request->floor_area_max);
        }

        // 築年数の絞り込み
        if ($request->filled('built_year_min')) {
            $query->where('built_year', '>=', $request->built_year_min * 5); // 5年刻みに変更
        }

        if ($request->filled('built_year_max')) {
            $query->where('built_year', '<=', $request->built_year_max * 5); // 5年刻みに変更
        }

        // 絞り込み条件が一つも存在しない場合、すべてのデータを取得
        if (!$request->filled('status') && !$request->filled('location') && !$request->filled('layouts') && !$request->filled('rent_min') && !$request->filled('rent_max') && !$request->filled('floor_area_min') && !$request->filled('floor_area_max') && !$request->filled('built_year_min') && !$request->filled('built_year_max')) {
            $properties = $query->get();
        } else {
            $properties = $query->get();
        }

        // クエリログの取得
        $queries = DB::getQueryLog();

        // 取得したプロパティデータをビューに渡して表示
        return view('admin.index', ['properties' => $properties, 'queries' => $queries]);
    }


    public function search(Request $request)
    {
        // クエリログの有効化
        DB::enableQueryLog();

        // プロパティモデルのクエリビルダーを作成
        $query = Property::query();

        // 公開ステータスの絞り込み
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 所在地の絞り込み
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // 間取りの絞り込み
        if ($request->filled('layouts')) {
            $query->whereIn('layout', $request->layouts);
        }

        // 賃料の絞り込み
        if ($request->filled('rent_min') && is_numeric($request->rent_min)) {
            $query->where('rent', '>=', $request->rent_min);
        }

        if ($request->filled('rent_max') && is_numeric($request->rent_max)) {
            $query->where('rent', '<=', $request->rent_max);
        }

        // 専有面積の絞り込み
        if ($request->filled('floor_area_min') && is_numeric($request->floor_area_min)) {
            $query->where('floor_area', '>=', $request->floor_area_min);
        }

        if ($request->filled('floor_area_max') && is_numeric($request->floor_area_max)) {
            $query->where('floor_area', '<=', $request->floor_area_max);
        }

        // 築年数の絞り込み
        if ($request->filled('built_year_min')) {
            $query->where('built_year', '>=', $request->built_year_min * 5); // 5年刻みに変更
        }

        if ($request->filled('built_year_max')) {
            $query->where('built_year', '<=', $request->built_year_max * 5); // 5年刻みに変更
        }

        // 絞り込み条件が一つも存在しない場合、すべてのデータを取得
        if (!$request->filled('status') && !$request->filled('location') && !$request->filled('layouts') && !$request->filled('rent_min') && !$request->filled('rent_max') && !$request->filled('floor_area_min') && !$request->filled('floor_area_max') && !$request->filled('built_year_min') && !$request->filled('built_year_max')) {
            $properties = collect(); // 空のコレクションを返す
        } else {
            $properties = $query->get();
        }

        // クエリログの取得
        $queries = DB::getQueryLog();

        // 取得したプロパティデータをビューに渡して表示
        return view('user.search', ['properties' => $properties, 'queries' => $queries]);
    }




    public function show($id)
    {
        $property = Property::findOrFail($id);

        return view('admin.detail', ['property' => $property]);
    }

}
