```plantuml

actor       User  as user
boundary    GUI    as gui
control     Login_Controller     as controller
control     Google_Auth     as google
database    Database    as db

user -> gui : CLick button "Login with google"
gui -> controller : Request đến url auth/google
controller -> google : Direct to  Google Auth
google -> user : Yêu cầu đăng nhập và cấp quyền
user -> google : Đăng nhập và cấp quyền
google -> controller : Direct to auth/google/callback
controller -> controller: Thông tin user, email
controller -> db: Kiểm tra user trong database
db -> controller: Thông user trong database
controller -> db: Tạo mới user
db -> controller : Kết quả tạo user mới thành công
controller -> gui : Kết quả login thành công
gui -> user : Hiển thị kết quả đăng nhập thành công

```
