|             |             |      |        |          |
| ----------- | ----------- | ---- | ------ | -------- |
| 字段        | 类型        | 空   | 默认   | 注释     |
| id *(主键)* | int(10)     | 否   |        |          |
| username    | varchar(40) | 否   |        | 用户名   |
| password    | char(32)    | 否   |        | 密码     |
| name        | varchar(30) | 否   |        | 真实姓名 |
| tel         | char(11)    | 否   |        | 电话     |
| email       | varchar(50) | 否   |        | 邮箱     |
| reg_time    | int(11)     | 否   |        | 注册时间 |
| created_at  | timestamp   | 是   | *NULL* |          |
| updated_at  | timestamp   | 是   | *NULL* |          |

