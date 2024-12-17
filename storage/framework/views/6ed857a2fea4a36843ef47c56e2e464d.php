<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận khôi phục tài khoản</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <header style="background-color: #f4f4f4; padding: 20px; text-align: center;">
        <h1 style="color: #444; margin: 0;">Xác nhận khôi phục tài khoản</h1>
    </header>
    <main style="padding: 20px;">
        <p>Xin chào <?php echo e($user->fullname); ?>,</p>
        <p>Bạn đã yêu cầu khôi phục tài khoản. Vui lòng nhấn nút bên dưới để xác nhận khôi phục tài khoản VNSHOP:</p>
        <div style="text-align: center; margin: 30px 0;">
            <a href="<?php echo e(route('confirm_restore_account', ['token' => $token, 'email' => $user->email])); ?>" style="background-color: #4CAF50; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block; border-radius: 4px; font-size: 16px;">Xác nhận thay đổi mật khẩu</a>
        </div>
        <p>Mail này sẽ hết hạn trong 24 giờ.</p>
        <p>Nếu bạn không thay đổi mật khẩu, vui lòng bỏ qua email này.</p>
    </main>
    <footer style="background-color: #f4f4f4; padding: 20px; text-align: center; font-size: 12px;">
        <p>&copy; <?php echo e(date('Y')); ?> VN Shop. All rights reserved.</p>
    </footer>
</body>
</html>
<?php /**PATH D:\laragon\www\datn_1\resources\views/emails/cofirm_restore_account.blade.php ENDPATH**/ ?>