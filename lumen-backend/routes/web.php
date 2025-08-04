<?php
use Illuminate\Support\Facades\Mail;


$router->get('/', function () {
    return response()->json(['message' => 'API is up and running!']);
});


$router->get('/send-test-email', function () {
    try {
        Mail::raw('This is a test email from your Lumen app.', function ($message) {
            $message->to('skunkelmusen@gmail.com')
                    ->subject('Test Email');
        });

        return response()->json(['message' => 'Test email sent successfully!']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to send email: ' . $e->getMessage()]);
    }
});
