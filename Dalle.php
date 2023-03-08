<?php
class Dalle{

    private function API_KEY(){

    // put in your API key.

        return $secret_key = 'sk-YourOpenAIAPIKey';
          }


    private function configuration($prompt,$resolution){

    // configuration of OpenAI here

        $request_body = [
        "prompt" => $prompt,
        "size" => $resolution,
        "n"=> 1
        ];

   return $request_body;

    }



    public function generation($prompt, $resolution){

        $request_body = $this->configuration($prompt,$resolution);
        $postfields = json_encode($request_body);
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.openai.com/v1/images/generations",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->API_KEY()
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "Error #:" . $err;
            die();
        } else {
            return $response;
        }

    }

}
