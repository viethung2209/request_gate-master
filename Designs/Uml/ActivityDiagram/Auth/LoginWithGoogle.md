```plantuml

|Client|
start
:Request đến trang
Login with google;
|Server|
:Direct đến Google Auth
kèm theo các thông tin ID,
SECRET, REDIRECT_URL;
|Google|
:Google Auth;
repeat ;
:Form đăng nhập Google;
|Client|
:Fill thông tin
đăng nhập Google;
|Google|
repeat while (Đăng nhập Google?) is (No) not (Yes)
:Direct lại trang Callback;
|Server|
:Lấy thông tin user
(email, google id, name...);
if (Kiểm tra user tồn tại?) then (yes)
    #palegreen:return Success
    token, userInfo;
else (no)
    :Tạo tài khoản;
    |Database|
    :Lưu thông tin user;
    |Server|
    #palegreen:return Success
    token, userInfo;
endif
|Client|
stop

```
