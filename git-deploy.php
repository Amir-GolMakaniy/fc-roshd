<?php
// مسیر پروژه در هاست
$repo_path = '/home/fcrir/public_html';

// تغییر مسیر به پوشه پروژه
chdir($repo_path);

// اجرای دستور Pull
exec('git pull origin main 2>&1', $output, $status);

// ثبت لاگ برای بررسی
file_put_contents('deploy.log', implode("\n", $output) . "\n", FILE_APPEND);

// پاسخ به GitHub
if ($status === 0) {
	http_response_code(200);
	echo 'Deployment successful';
} else {
	http_response_code(500);
	echo 'Deployment failed: ' . implode("\n", $output);
}
