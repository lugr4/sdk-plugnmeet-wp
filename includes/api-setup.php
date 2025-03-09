<?php
if (!defined('ABSPATH')) {
    exit;
}


/*CONNECT*/
require_once SPW_PLUGIN_DIR . 'includes/sdk/plugNmeetConnect.php';

/*HANDLERS*/
require_once SPW_PLUGIN_DIR . 'includes/sdk/handlers/ValidationParams.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/handlers/CreateRoomHandler.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/handlers/GetActiveRoomInfoHandler.php';

/*PARAMETRERS*/
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/GetActiveRoomInfoParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/RoomFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/LockSettingsParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/CreateRoomParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/RoomMetadataParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/CopyrightConfParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/RecordingFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/ChatFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/SharedNotePadFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/WhiteboardFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/ExternalMediaPlayerFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/WaitingRoomFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/BreakoutRoomFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/DisplayExternalLinkFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/IngressFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/SpeechToTextTranslationFeaturesParameters.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/Parameters/EndToEndEncryptionFeaturesParameters.php';

/* RESPONSES */
require_once SPW_PLUGIN_DIR . 'includes/sdk/responses/BaseResponse.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/responses/CreateRoomResponse.php';
require_once SPW_PLUGIN_DIR . 'includes/sdk/responses/GetActiveRoomInfoResponse.php';


class PlugNmeet {
    private $serverUrl;
    private $apiKey;
    private $apiSecret;
    private $algo;
    private $SPW_defaultPath;

    public function __construct() {
        // Obtener las opciones guardadas o usar valores por defecto
        $this->serverUrl = get_option('spw_server_url', 'http://localhost:8080');
        $this->SPW_defaultPath = '/auth';
        $this->apiKey = get_option('spw_api_key', 'plugnmeet');
        $this->apiSecret = get_option('spw_api_secret', 'zumyyYWqv7KR2kUqvYdq4z4sXg7XTBD2ljT6');
        $this->algo = 'sha256';
    }

     /**
     * Create new room
     *
     * @param CreateRoomParameters $createRoomParameters
     */
    public function createRoom(CreateRoomParameters $createRoomParameters){
        $body = $createRoomParameters->buildBody();
        $output = $this->sendRequest("/room/create", $body);
        return $output;
    }

    /**
     * Get active room information
     *
     * @param GetActiveRoomInfoParameters $getActiveRoomInfoParameters
     * @return GetActiveRoomInfoResponse
     */
    public function getActiveRoomInfo(GetActiveRoomInfoParameters $getActiveRoomInfoParameters) {
        $body = $getActiveRoomInfoParameters->buildBody();
        $output = $this->sendRequest("/room/getActiveRoomInfo", $body);
        return $output;
    }

    /**
     * Get all active rooms
     *
     * @return GetActiveRoomsInfoResponse
     */
    public function getActiveRoomsInfo(){
        $output = $this->sendRequest("/room/getActiveRoomsInfo", []);
        return $output;
    }


    /*TEST**/
    public function testSendRequest($body) {
        $path = '/room/getActiveRoomInfo';    
        $output = $this->sendRequest($path, $body);
        return $output;
        // print_r($response);
    }

    /**
     * Enviar una solicitud a la API de PlugNMeet.
     *
     * @param string $path Ruta del endpoint.
     * @param array $body Cuerpo de la solicitud.
     * @return stdClass Respuesta de la API.
     */
    protected function sendRequest($path, array $body): stdClass {
        $output = new stdClass();
        $output->status = false;

        $fields = json_encode($body);
        $signature = hash_hmac($this->algo, $fields, $this->apiSecret);

        $header = array(
            "Content-type:application/json",
            "API-KEY:" . $this->apiKey,
            "HASH-SIGNATURE:" . $signature
        );
        $url = $this->serverUrl . $this->SPW_defaultPath . $path;

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            $error = curl_error($ch);
            $errno = curl_errno($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $response = !empty($result) ? json_decode($result) : null;

            if ($errno !== 0) {
                $output->response = "Error: " . $error;
                return $output;
            } elseif ((int)$httpCode !== 200) {
                $output->response = isset($response->msg) ? $response->msg : "HTTP error: " . $httpCode;
                return $output;
            }

            $output->status = true;
            $output->response = $response;
        } catch (Exception $e) {
            $output->response = "Exception: " . $e->getMessage();
        }
        return $output;
    }
}
