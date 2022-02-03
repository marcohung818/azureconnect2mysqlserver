<?php
  function keyvault(){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://login.microsoftonline.com/8c0c9258-b8f5-4b63-a503-14609db71a85/oauth2/token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=8d475561-ee3a-4cf0-90b4-a6584c337646&client_secret=Q10o~4bS-84MprGFPNu74lvWkeLXSpwPSC&resource=https%3A%2F%2Fvault.azure.net");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $bear_token = curl_exec($curl);
    curl_close($curl);
    $bear_token = json_decode($bear_token, true);
    $getpass = curl_init();
    $url = "https://ap-cloud-quiz-vaultkey.vault.azure.net/secrets/ap-cloud-quiz-key-value/44b7dccdcd42445aa1c1f2b0a8c8d0a8?api-version=7.1";
    curl_setopt($getpass, CURLOPT_URL, $url);
    $header = ["Authorization: Bearer ".$bear_token['access_token'], "Content-Type: application/json"];
    curl_setopt($getpass, CURLOPT_HTTPHEADER, $header);
    $output = curl_exec($getpass);
    $output = json_decode($output, true);
    return $output['value'];
  }
?>
