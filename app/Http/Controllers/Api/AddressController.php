<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function address($zip)
    {
        try {
            // デバッグメッセージをログに記録
            \Log::info('Address controller reached with zip: ' . $zip);
    
            $address = Address::where('zip', intval($zip))->first();
    
            if (!$address) {
                \Log::info('Address not found for zip: ' . $zip);
                return response()->json(['error' => '住所が見つかりませんでした'], 404, [], JSON_UNESCAPED_UNICODE);
            }
    
            \Log::info('Address found: ' . $address);
            return response()->json($address, 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            // エラーメッセージをログに記録
            \Log::error('Error in Address controller: ' . $e->getMessage());
            return response()->json(['error' => 'サーバーエラーが発生しました'], 500);
        }
    }}
