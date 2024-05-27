<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TwitterHelper;


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
    
}

