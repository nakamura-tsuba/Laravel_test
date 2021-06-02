<?php

namespace App\Services;

class CheckSearchData
{

    public static function checkSearch($query,$search){

        //もしキーワードがあったら
        if($search !== null){
            //全角スペースを半角に
            $search_split = mb_convert_kana($search,'s');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($search_split2 as $value)
            {
                $query->where('your_name','like','%'.$value.'%');
            }
        };

        $query->select('id', 'your_name', 'title','category_id');
        $query->orderBy('id', 'desc');
        $contacts = $query->paginate(20);

        return $contacts;
    }
}
