<?php
/**
 * Created by IntelliJ IDEA.
 * User: chandrakiran.ks
 * Date: 25/11/15
 * Time: 1:10 PM
 */

class auth {

    var $client_id      = "999786565275-aa2dll6fn9t2743g3lgsfdob17fu5egj.apps.googleusercontent.com"; //your client id
    var $client_secret  = "QmXhLgVrzJhZu5M4c2InkrX5"; //your client secret
    var $redirect_uri   = "http://lego-console.com:25555/slashn15php/catchtoken.php";
    var $scope          = "https://www.googleapis.com/auth/userinfo.email"; //google scope to access
    var $state          = "profile"; //optional
    var $access_type    = "offline"; //optional - allows for retrieval of refresh_token for offline access
    var $profileURL     = "https://www.googleapis.com/oauth2/v1/userinfo";
    var $hd             = 'flipkart.com';

    function getOAuth2AccessToken($code) {

        $oauth2token_url    = "https://accounts.google.com/o/oauth2/token";
        $clientTokenPost   = array(
            "code" => $code,
            "client_id" => $this->client_id,
            "client_secret" => $this->client_secret,
            "redirect_uri" => $this->redirect_uri,
            "grant_type" => "authorization_code"
        );

        $curl = curl_init($oauth2token_url);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $clientTokenPost);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $json_response = curl_exec($curl);
        curl_close($curl);

        $authObj = json_decode($json_response);

        if (isset($authObj->refresh_token)){
            global $refreshToken;
            $refreshToken = $authObj->refresh_token;
        }

        $accessToken = $authObj->access_token;
        return $accessToken;
    }

    function getOAuth2Profile($accessToken){

        $curl = curl_init($this->profileURL);

        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $curlHeader[0] = "Authorization: Bearer " . $accessToken;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $curlHeader);

        $json_response = curl_exec($curl);
        curl_close($curl);

        $responseObj = json_decode($json_response);
        return $responseObj;
    }

    function getSignInURL(){

        $loginUrl = sprintf("https://accounts.google.com/o/oauth2/auth?scope=%s&state=%s&redirect_uri=%s&response_type=code&client_id=%s&hd=%s", $this->scope, $this->state, $this->redirect_uri, $this->client_id, $this->hd);
        return $loginUrl;
    }



}