<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('katakana', function ($attribute, $value, $parameters, $validator) {
            // カタカナの正規表現を使用してバリデーション
            return preg_match('/^[\p{Katakana} ー]+$/u', $value);
        });

        Validator::replacer('katakana', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attributeはカタカナで入力してください。');
        });
    }
}
