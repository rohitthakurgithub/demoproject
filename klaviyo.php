<?php

$curl = curl_init();
$request = [
  'data' => [
      'type' => 'profile-subscription-bulk-create-job',
      'attributes' => [
              'list_id' => 'SbtVPy',
               'custom_source' => 'Marketing Event',
              'subscriptions' => [
                                  [
                                    'channels' => [
                                      'email' => [
                                               'MARKETING'
                                                    ],
                                             'sms' => [
                                               'MARKETING'
                                            ]
                                      ],
                                    'email' => 'matrix_dev1070@gmail.com',
                                    'phone_number' => '+15005550006',
                                 'profile_id' => '01H3CGV3YSJH1D0DCPSTCQE52X',
                               ]
                            
                     ] 
             ]
         ]
    ];
    $request_encode = json_encode($request);
    // print_r($request_encode);
    // die();
curl_setopt_array($curl, [
  CURLOPT_URL => "https://a.klaviyo.com/api/profile-subscription-bulk-create-jobs/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $request_encode,
  CURLOPT_HTTPHEADER => [
    "Authorization: Klaviyo-API-Key pk_6c0abce9b4f8893c1203d4afdbbfc30201",
    "accept: application/json",
    "content-type: application/json",
    "revision: 2023-06-20"
  ],
]);

$response = curl_exec($curl);
// echo $response;
// die();
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}else{
  echo $response;
  echo 'yes';
}


