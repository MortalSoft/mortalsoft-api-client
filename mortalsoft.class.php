<?php

/*********************************************************************
                       __         .__                _____  __   
  _____   ____________/  |______  |  |   ___________/ ____\/  |_ 
 /     \ /  _ \_  __ \   __\__  \ |  |  /  ___/  _ \   __\\   __\
|  Y Y  (  <_> )  | \/|  |  / __ \|  |__\___ (  <_> )  |   |  |  
|__|_|  /\____/|__|   |__| (____  /____/____  >____/|__|   |__|  
      \/                        \/          \/                   
**********************************************************************/

class APIClient
{
    private $baseUrl;
    private $token;

    public function __construct($baseUrl, $token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    /**
     * List Games
     *
     * @param array $queryParams Query parameters to filter the list of games.
     * @return array|false Returns an array of games or false on failure.
     */
    public function listGames($queryParams = [])
    {
        $url = $this->baseUrl . '/api/' . $this->token . '/listGames';
        $queryString = http_build_query($queryParams);

        if (!empty($queryString)) {
            $url .= '?' . $queryString;
        }

        return $this->sendRequest($url);
    }

    /**
     * Get Balance
     *
     * @param string $identifier The unique identifier of the user.
     * @return array|false Returns the user's balance or false on failure.
     */
    public function getBalance($identifier)
    {
        $url = $this->baseUrl . '/api/' . $this->token . '/getBalance';
        $data = [
            'identifier' => $identifier
        ];

        return $this->sendRequest($url, $data);
    }

    /**
     * Change Balance
     *
     * @param string $identifier The unique identifier of the user.
     * @param float $amount The new balance amount.
     * @return array|false Returns the response status or false on failure.
     */
    public function changeBalance($identifier, $amount)
    {
        $url = $this->baseUrl . '/api/' . $this->token . '/changeBalance';
        $data = [
            'identifier' => $identifier,
            'amount' => $amount
        ];

        return $this->sendRequest($url, $data);
    }

    /**
     * Create Session
     *
     * @param string $identifier The unique identifier of the user.
     * @return array|false Returns the JWT token for the user's session or false on failure.
     */
    public function createSession($identifier)
    {
        $url = $this->baseUrl . '/api/' . $this->token . '/createSession';
        $data = [
            'identifier' => $identifier
        ];

        return $this->sendRequest($url, $data);
    }

    private function sendRequest($url, $data = [])
    {
        $headers = [
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json'
        ];

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
        ];

        if (!empty($data)) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
        }

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
?>
