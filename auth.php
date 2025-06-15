<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/authlib.php');

class auth_plugin_oauthbridge extends auth_plugin_base {

    public function user_login($username, $password) {
        $url = 'http://localhost:3000/verify';
        $data = ['username' => $username, 'password' => $password];

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result, true);

        return $response['success'] ?? false;
    }
}
