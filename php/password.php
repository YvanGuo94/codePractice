<?php
/**
 * Created by PhpStorm.
 * User: guoyufeng
 * Date: 2018/7/22
 * Time: 下午4:18
 */
//echo password_hash('123456');

$password_plaintext = "12345";
$password_hash = password_hash( $password_plaintext, PASSWORD_BCRYPT);
echo $password_hash;

print_r(password_get_info($password_hash));
print_r(password_get_info('$2a$10$22dc74fea4dad97557fb6uObbj5JcXGa2L0cg2F5ZZMWKawg5AKjm'));

var_dump(password_verify('12345',$password_hash));

