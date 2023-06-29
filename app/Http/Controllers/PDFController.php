<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
        return $pdf->stream('title.pdf');
    }
    public function index(){

    	$pdf = PDF::loadHTML('<h1>Hello World</h1>');

    	return $pdf->inline();

    }
}
