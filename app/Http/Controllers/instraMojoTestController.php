<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class instraMojoTestController extends Controller
{
   // public function TestIntramojo(Request $request)
   // 		{
   // 			$ch = curl_init();

			// curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
			// curl_setopt($ch, CURLOPT_HEADER, FALSE);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			// curl_setopt($ch, CURLOPT_HTTPHEADER,
			//             array("X-Api-Key:test_f8e273e7cbb01aa7cd24f73e0d4",
			//                   "X-Auth-Token:test_bad0f907c266d00fbcd4da6461f"));
			// $payload = Array(
			//     'purpose' => 'Buy Product',
			//     'amount' => '2500',
			//     'phone' => '9999999999',
			//     'buyer_name' => 'developerJK',
			//     'redirect_url' => 'http://127.0.0.1:8000/instramojo_redirect/',
			//     'send_email' => true,
			//     'webhook' => 'http://www.example.com/webhook/',
			//     'send_sms' => true,
			//     'email' => 'foo@example.com',
			//     'allow_repeated_payments' => false
			// );
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
			// $response = curl_exec($ch);
			// curl_close($ch); 

			// $response = json_decode($response);
			// // echo "<pre>";
			// return redirect($response->payment_request->longurl);
   // 		}

   // 		public function instramojo_redirect()
   // 			{
   // 				echo "<pre>";
   // 				print_r($_GET);
   // 			}
}
