<?php

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;

function sendEmail($to_email, $to_name, $subject, $html_content)
{
    $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', BREVO_API_KEY);
    $apiInstance = new TransactionalEmailsApi(new GuzzleHttp\Client(), $config);

    $sendSmtpEmail = new SendSmtpEmail([
        'to' => [['email' => $to_email, 'name' => $to_name]],
        'sender' => ['email' => BREVO_EMAIL, 'name' => BREVO_NAME],
        'subject' => $subject,
        'htmlContent' => $html_content
    ]);

    try {
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        return ['status' => 'success', 'result' => $result];
    } catch (Exception $e) {
        return ['status' => 'error', 'message' => $e->getMessage()];
    }
}
