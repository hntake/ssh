<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TwitterHelper;
use DateTime;

class PDFController extends Controller
{
    public function pdf(Request $request){

        $data = [
            'project_name' => $request->input('project-name'),
            'billing_address' => $request->input('billing-address'),
            'billing_date' => $request->input('billing-date'),
            'type1' => $request->input('type1'),
            'cost1' => $request->input('cost1'),
            'count1' => $request->input('count1'),

        ];

        if ($request->input('type2') !== null) {
            $data['type2'] = $request->input('type2');
        }
        if ($request->input('type3') !== null) {
            $data['type3'] = $request->input('type3');
        }
        if ($request->input('type4') !== null) {
            $data['type4'] = $request->input('type4');
        }
        if ($request->input('type5') !== null) {
            $data['type5'] = $request->input('type5');
        }
        if ($request->input('cost2') !== null) {
            $data['cost2'] = $request->input('cost2');
        }  else{
            $data['cost2'] = "0";
        }
        if ($request->input('cost3') !== null) {
            $data['cost3'] = $request->input('cost3');
        }else{
            $data['cost3'] = "0";
        }
        if ($request->input('cost4') !== null) {
            $data['cost4'] = $request->input('cost4');
        }else{
            $data['cost4'] = "0";
        }
        if ($request->input('cost5') !== null) {
            $data['cost5'] = $request->input('cost5');
        }else{
            $data['cost5'] = "0";
        }
        if ($request->input('count2') !== null) {
            $data['count2'] = $request->input('count2');
        }else{
            $data['count2'] = "0";
        }
        if ($request->input('count3') !== null) {
            $data['count3'] = $request->input('count3');
        }else{
            $data['count3'] = "0";
        }
        if ($request->input('count4') !== null) {
            $data['count4'] = $request->input('count4');
        }else{
            $data['count4'] = "0";
        }
        if ($request->input('count5') !== null) {
            $data['count5'] = $request->input('count5');
        }else{
            $data['count5'] = "0";
        }




        $pdf = \PDF::loadView('invoice.document', $data);
        return $pdf->stream('請求書.pdf');
    }

    public function receipt(Request $request){
        $data = [
            'project_name' => $request->input('project-name'),
            'billing_address' => $request->input('billing-address'),
            'billing_date' => $request->input('billing-date'),
            'type1' => $request->input('type1'),
            'cost1' => $request->input('cost1'),
            'count1' => $request->input('count1'),

        ];

        if ($request->input('type2') !== null) {
            $data['type2'] = $request->input('type2');
        }
        if ($request->input('type3') !== null) {
            $data['type3'] = $request->input('type3');
        }
        if ($request->input('type4') !== null) {
            $data['type4'] = $request->input('type4');
        }
        if ($request->input('type5') !== null) {
            $data['type5'] = $request->input('type5');
        }
        if ($request->input('cost2') !== null) {
            $data['cost2'] = $request->input('cost2');
        }  else{
            $data['cost2'] = "0";
        }
        if ($request->input('cost3') !== null) {
            $data['cost3'] = $request->input('cost3');
        }else{
            $data['cost3'] = "0";
        }
        if ($request->input('cost4') !== null) {
            $data['cost4'] = $request->input('cost4');
        }else{
            $data['cost4'] = "0";
        }
        if ($request->input('cost5') !== null) {
            $data['cost5'] = $request->input('cost5');
        }else{
            $data['cost5'] = "0";
        }
        if ($request->input('count2') !== null) {
            $data['count2'] = $request->input('count2');
        }else{
            $data['count2'] = "0";
        }
        if ($request->input('count3') !== null) {
            $data['count3'] = $request->input('count3');
        }else{
            $data['count3'] = "0";
        }
        if ($request->input('count4') !== null) {
            $data['count4'] = $request->input('count4');
        }else{
            $data['count4'] = "0";
        }
        if ($request->input('count5') !== null) {
            $data['count5'] = $request->input('count5');
        }else{
            $data['count5'] = "0";
        }


        $pdf = \PDF::loadView('invoice.receipt', $data);
        return $pdf->stream('領収書.pdf');
    }

    //オープン請求書
    public function pdf_open(Request $request){

        $data = [
            'billing_address' => $request->input('billing-address'),
            'billing_date' => $request->input('billing-date'),
            'invoice_number' => $request->input('invoice_number'),
            'type1' => $request->input('type1'),
            'cost1' => $request->input('cost1'),
            'count1' => $request->input('count1'),
            'company_name' => $request->input('company_name'),

        ];

        if ($request->input('type2') !== null) {
            $data['type2'] = $request->input('type2');
        }
        if ($request->input('type3') !== null) {
            $data['type3'] = $request->input('type3');
        }
        if ($request->input('type4') !== null) {
            $data['type4'] = $request->input('type4');
        }
        if ($request->input('type5') !== null) {
            $data['type5'] = $request->input('type5');
        }
        if ($request->input('cost2') !== null) {
            $data['cost2'] = $request->input('cost2');
        }  else{
            $data['cost2'] = "0";
        }
        if ($request->input('cost3') !== null) {
            $data['cost3'] = $request->input('cost3');
        }else{
            $data['cost3'] = "0";
        }
        if ($request->input('cost4') !== null) {
            $data['cost4'] = $request->input('cost4');
        }else{
            $data['cost4'] = "0";
        }
        if ($request->input('cost5') !== null) {
            $data['cost5'] = $request->input('cost5');
        }else{
            $data['cost5'] = "0";
        }
        if ($request->input('count2') !== null) {
            $data['count2'] = $request->input('count2');
        }else{
            $data['count2'] = "0";
        }
        if ($request->input('count3') !== null) {
            $data['count3'] = $request->input('count3');
        }else{
            $data['count3'] = "0";
        }
        if ($request->input('count4') !== null) {
            $data['count4'] = $request->input('count4');
        }else{
            $data['count4'] = "0";
        }
        if ($request->input('count5') !== null) {
            $data['count5'] = $request->input('count5');
        }else{
            $data['count5'] = "0";
        }
        if ($request->input('postal_number') !== null) {
            $data['postal_number'] = $request->input('postal_number');
        }
        if ($request->input('address') !== null) {
            $data['address'] = $request->input('address');
        }
        if ($request->input('phone_number') !== null) {
            $data['phone_number'] = $request->input('phone_number');
        }
        if ($request->input('company_number') !== null) {
            $data['company_number'] = $request->input('company_number');
        }
        $data['eight']=0;
        $data['ten']=0;
        //税率の選択
        if ($request->input('category1') == 1) {
            $data['category1'] = "1";
            $data['ten'] +=$data['cost1'] * $data['count1'];
        }
        else{
            $data['category1'] = "2";
            $data['eight'] +=$data['cost1'] * $data['count1'];
        }
        if ($request->input('category2') == 1) {
            $data['category2'] = "1";
            $data['ten'] +=$data['cost2'] * $data['count2'];
        }
        else{
            $data['category2'] = "2";
            $data['eight'] +=$data['cost2'] * $data['count2'];
        }
        if ($request->input('category3') == 1) {
            $data['category3'] = "1";
            $data['ten'] +=$data['cost3'] * $data['count3'];
        }
        else{
            $data['category3'] = "2";
            $data['eight'] +=$data['cost3'] * $data['count3'];
        }
        if ($request->input('category4') == 1) {
            $data['category4'] = "1";
            $data['ten'] +=$data['cost4'] * $data['count4'];
        }
        else{
            $data['category4'] = "2";
            $data['eight'] +=$data['cost4'] * $data['count4'];
        }
        if ($request->input('category5') == 1) {
            $data['category5'] = "1";
            $data['ten'] +=$data['cost5'] * $data['count5'];
        }
        else{
            $data['category5'] = "2";
            $data['eight'] +=$data['cost5'] * $data['count5'];
        }

        $pdf = \PDF::loadView('invoice.open_document', $data);

        // Twitterにツイートする例
        $twitterHelper = new TwitterHelper();
        $result = $twitterHelper->tweet($pdf);

        return $pdf->stream('オープン請求書.pdf');
    }
    
    //オープン領収書
    public function pdf_r(Request $request){

        $data = [
            'project_name' => $request->input('project-name'),
            'billing_address' => $request->input('billing-address'),
            'billing_date' => $request->input('billing-date'),
            'invoice_number' => $request->input('invoice_number'),
            'type1' => $request->input('type1'),
            'cost1' => $request->input('cost1'),
            'count1' => $request->input('count1'),
            'company_name' => $request->input('company_name'),
            'type' => $request->input('type'),
        ];
        if ($request->input('type2') !== null) {
            $data['type2'] = $request->input('type2');
        }
        if ($request->input('type3') !== null) {
            $data['type3'] = $request->input('type3');
        }
        if ($request->input('type4') !== null) {
            $data['type4'] = $request->input('type4');
        }
        if ($request->input('type5') !== null) {
            $data['type5'] = $request->input('type5');
        }
        if ($request->input('cost2') !== null) {
            $data['cost2'] = $request->input('cost2');
        }  else{
            $data['cost2'] = "0";
        }
        if ($request->input('cost3') !== null) {
            $data['cost3'] = $request->input('cost3');
        }else{
            $data['cost3'] = "0";
        }
        if ($request->input('cost4') !== null) {
            $data['cost4'] = $request->input('cost4');
        }else{
            $data['cost4'] = "0";
        }
        if ($request->input('cost5') !== null) {
            $data['cost5'] = $request->input('cost5');
        }else{
            $data['cost5'] = "0";
        }
        if ($request->input('count2') !== null) {
            $data['count2'] = $request->input('count2');
        }else{
            $data['count2'] = "0";
        }
        if ($request->input('count3') !== null) {
            $data['count3'] = $request->input('count3');
        }else{
            $data['count3'] = "0";
        }
        if ($request->input('count4') !== null) {
            $data['count4'] = $request->input('count4');
        }else{
            $data['count4'] = "0";
        }
        if ($request->input('count5') !== null) {
            $data['count5'] = $request->input('count5');
        }else{
            $data['count5'] = "0";
        }
        if ($request->input('postal_number') !== null) {
            $data['postal_number'] = $request->input('postal_number');
        }
        if ($request->input('address') !== null) {
            $data['address'] = $request->input('address');
        }
        if ($request->input('phone_number') !== null) {
            $data['phone_number'] = $request->input('phone_number');
        }
        if ($request->input('company_number') !== null) {
            $data['company_number'] = $request->input('company_number');
        }
        $data['eight']=0;
        $data['ten']=0;
        //税率の選択
        if ($request->input('category1') == 1) {
            $data['category1'] = "1";
            $data['ten'] +=$data['cost1'] * $data['count1'];
        }
        elseif($request->input('category1') == 2){
            $data['category1'] = "2";
            $data['eight'] +=$data['cost1'] * $data['count1'];
        }else{
            $data['category1'] = "3";
        }
        if ($request->input('category2') == 1) {
            $data['category2'] = "1";
            $data['ten'] +=$data['cost2'] * $data['count2'];
        }
        elseif($request->input('category2') == 2){
            $data['category2'] = "2";
            $data['eight'] +=$data['cost2'] * $data['count2'];
        }else{
            $data['category2'] = "3";
        }
        if ($request->input('category3') == 1) {
            $data['category3'] = "1";
            $data['ten'] +=$data['cost3'] * $data['count3'];
        }
        elseif($request->input('category3') == 2){
            $data['category3'] = "2";
            $data['eight'] +=$data['cost3'] * $data['count3'];
        }else{
            $data['category3'] = "3";
        }
        if ($request->input('category4') == 1) {
            $data['category4'] = "1";
            $data['ten'] +=$data['cost4'] * $data['count4'];
        }
        elseif($request->input('category4') == 2){
            $data['category4'] = "2";
            $data['eight'] +=$data['cost4'] * $data['count4'];
        }else{
            $data['category4'] = "3";
        }
        if ($request->input('category5') == 1) {
            $data['category5'] = "1";
            $data['ten'] +=$data['cost5'] * $data['count5'];
        }
        elseif($request->input('category5') == 2){
            $data['category5'] = "2";
            $data['eight'] +=$data['cost5'] * $data['count5'];
        }else{
            $data['category5'] = "3";
        }

        $pdf = \PDF::loadView('invoice.open_r_document', $data);

        // Twitterにツイートする例
        $twitterHelper = new TwitterHelper();
        $result = $twitterHelper->tweet($pdf);

        return $pdf->stream('オープン領収書.pdf');
    }
    
    public function select(Request $request)
    {
        $familyStructure = $request->input('family_structure');
        $style = 0;

        // 選択に応じてstyleの値を設定
        if ($familyStructure == 'spouse_children') {
            $style = 1;
        } elseif ($familyStructure == 'divorced_children') {
            $style = 2;
        }else{
            $style = 3;
        }
        // style値を持たせて入力ページにリダイレクト
        return redirect()->route('inheritance_input', ['style' => $style]);
    }

    public function input(Request $request)
    {
        $style = $request->query('style');

        // 入力ページにスタイルを渡して表示
        return view('inheritance/create', ['style' => $style]);
    }

    public function pdf_in(Request $request,$id)
    {
    //スタイルの取得
    $style=$id;
    // データを取得
    $decedent = $request->input('decedent');
    $spouse = $request->input('spouse');
    $children = $request->input('children', []);
    $divorcedChildren = $request->input('divorced_children', []);
    $formerSpouseGender = $request->input('former_spouse')['gender'] ?? '';

    // 和暦形式のデータをそのまま使用
    $decedentBirthdate = "{$decedent['birthdate']['era']}{$decedent['birthdate']['year']}年{$decedent['birthdate']['month']}月{$decedent['birthdate']['day']}日";
    $decedentDeathdate = "{$decedent['deathdate']['era']}{$decedent['deathdate']['year']}年{$decedent['deathdate']['month']}月{$decedent['deathdate']['day']}日";
    $spouseBirthdate = "{$spouse['birthdate']['era']}{$spouse['birthdate']['year']}年{$spouse['birthdate']['month']}月{$spouse['birthdate']['day']}日";

        // 子供と離婚した子供の和暦形式データ
        $childrenFormatted = array_map(function($child) {
            return [
                'name' => $child['name'],
                'address' => $child['address'],
                'birthdate' => "{$child['birthdate']['era']}{$child['birthdate']['year']}年{$child['birthdate']['month']}月{$child['birthdate']['day']}日",
                'relationship' => $child['relationship'],
            ];
        }, $children);

        $divorcedChildrenFormatted = array_map(function($child) {
            return [
                'name' => $child['name'],
                'address' => $child['address'],
                'birthdate' => "{$child['birthdate']['era']}{$child['birthdate']['year']}年{$child['birthdate']['month']}月{$child['birthdate']['day']}日",
                'relationship' => $child['relationship'],
            ];
        }, $divorcedChildren);

        // 申出人の情報を取得
        $applicant = $request->input('applicant');

       // 申出人として選択された子供のデータを取得
        $provider = null;
        if (strpos($applicant, 'child') === 0) {
            $selectedChildId = str_replace('child', '', $applicant);
            // 子供IDに基づいてデータを取得
            $selectedChildData = isset($children[$selectedChildId]) ? $children[$selectedChildId] : null;
            $provider = $selectedChildData;
        }elseif(strpos($applicant, 'divorced_child') === 0) {
            $selectedChildId = str_replace('divorced_child', '', $applicant);
            // 子供IDに基づいてデータを取得
            $selectedChildData = isset($divorcedChildren[$selectedChildId]) ? $divorcedChildren[$selectedChildId] : null;
            $provider = $selectedChildData;
        } elseif ($applicant === 'spouse') {
            // 申出人として選択された配偶者のデータを$providerに格納
            $provider = $spouse;
        }
     // 日付を受け取る
    $dateTime = new DateTime();

    // 和暦に変換する関数を同じメソッド内に定義
    $convertToJapaneseEra = function(DateTime $date) {
        // 元号と開始年を定義
        $eras = [
            ['name' => '令和', 'start' => 2019],
            ['name' => '平成', 'start' => 1989],
            ['name' => '昭和', 'start' => 1926],
            ['name' => '大正', 'start' => 1912],
            ['name' => '明治', 'start' => 1868],
        ];

        // 年、月、日を取得
        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('d');

        // 和暦に変換
        foreach ($eras as $era) {
            if ($year >= $era['start']) {
                $eraYear = $year - $era['start'] + 1;
                return sprintf('%s %d年%d月%d日', $era['name'], $eraYear, $month, $day);
            }
        }
    };
        // 和暦に変換
    $currentDateJapanese = $convertToJapaneseEra($dateTime);

            // PDFのデータを作成
        $data = [
            'decedent' => [
                'name' => $decedent['name'],
                'last_address' => $decedent['last_address'],
                'last_domicile' => $decedent['last_domicile'],
                'birthdate' => $decedentBirthdate,
                'deathdate' => $decedentDeathdate,
            ],
            'spouse' => [
                'name' => $spouse['name'],
                'address' => $spouse['address'],
                'birthdate' => $spouseBirthdate,
                'relationship' => $spouse['relationship'],
            ],
            'provider' => [
                'name' => $provider['name'],
                'address' => $provider['address'],
                'currentDateJapanese' => $currentDateJapanese,
            ],
            'children' => $childrenFormatted,
            'divorced_children' => $divorcedChildrenFormatted,
            'former_spouse_gender' => $formerSpouseGender,
        ];
        // PDF生成
        if($style==1){
            $pdf = \PDF::loadView('inheritance.pdf_in', compact('data'));
            // Twitterにツイートする例
            $twitterHelper = new TwitterHelper();
            $result = $twitterHelper->tweet_inheritance($pdf);
            return $pdf->stream('法定相続一覧表.pdf');
        }elseif($style==3){
            $pdf = \PDF::loadView('inheritance.pdf_in_divorce_two', compact('data'));
            // Twitterにツイートする例
            $twitterHelper = new TwitterHelper();
            $result = $twitterHelper->tweet_inheritance($pdf);
            return $pdf->stream('法定相続一覧表.pdf');
        }else{
            $pdf = \PDF::loadView('inheritance.pdf_in_divorce', compact('data'));
            // Twitterにツイートする例
            $twitterHelper = new TwitterHelper();
            $result = $twitterHelper->tweet_inheritance($pdf);
            return $pdf->stream('法定相続一覧表.pdf');
        }

    }
}

