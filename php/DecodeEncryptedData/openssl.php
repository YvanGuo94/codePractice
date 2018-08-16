<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/23
 * Time: 上午10:55
 */

$appid = 'wx4f4bc4dec97d474b';
$sessionKey = 'tiihtNczf5v6AKRyjwEUhQ==';

$encryptedData = "CiyLU1Aw2KjvrjMdj8YKliAjtP4gsMZM
                QmRzooG2xrDcvSnxIMXFufNstNGTyaGS
                9uT5geRa0W4oTOb1WT7fJlAC+oNPdbB+
                3hVbJSRgv+4lGOETKUQz6OYStslQ142d
                NCuabNPGBzlooOmB231qMM85d2/fV6Ch
                evvXvQP8Hkue1poOFtnEtpyxVLW1zAo6
                /1Xx1COxFvrc2d7UL/lmHInNlxuacJXw
                u0fjpXfz/YqYzBIBzD6WUfTIF9GRHpOn
                /Hz7saL8xz+W//FRAUid1OksQaQx4CMs
                8LOddcQhULW4ucetDf96JcR3g0gfRK4P
                C7E/r7Z6xNrXd2UIeorGj5Ef7b1pJAYB
                6Y5anaHqZ9J6nKEBvB4DnNLIVWSgARns
                /8wR2SiRS7MNACwTyrGvt9ts8p12PKFd
                lqYTopNHR1Vf7XjfhQlVsAJdNiKdYmYV
                oKlaRv85IfVunYzO0IKXsyl7JCUjCpoG
                20f0a04COwfneQAGGwd5oa+T8yO5hzuy
                Db/XcxxmK01EpqOyuxINew==";
$iv = 'r7BXXKkLb8qrSNn05n0qiA==';


$aesKey = base64_decode($sessionKey);// 对称解密的秘钥 aeskey
$aesIV = base64_decode($iv); // 对称解密算法初始向
$aesCipher = base64_decode($encryptedData); // 对称解密的密文

$decrypted = openssl_decrypt($aesCipher, 'AES-128-CBC', $aesKey, OPENSSL_RAW_DATA, $aesIV);

//echo $decrypted . "\n";

$myvi = openssl_random_pseudo_bytes(16);
$myaeskey = '123456';
$myaeskey = substr(md5($myaeskey), 0, 16);
$mycontent = '{"aa":1}';

$myencrypted = openssl_encrypt($mycontent, 'AES-128-CBC', base64_decode($myaeskey), OPENSSL_RAW_DATA, $myvi);

//echo $myencrypted . "\n";

$mydecryted = openssl_decrypt($myencrypted, 'AES-128-CBC', $myaeskey, OPENSSL_RAW_DATA, $myvi);

//echo $mydecryted . "\n";
//print_r(openssl_get_cipher_methods());

$myvi = openssl_random_pseudo_bytes(8);
//echo base64_encode($myvi);die;
$myaeskey = '123';
$myaeskey = substr(md5($myaeskey), 0, 8);
$mycontent = '{"aa":1}';
//$mycontent = '{"aa":1,"bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb":1,"qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq":3}';

$myencrypted = openssl_encrypt($mycontent, 'DES-CBC', $myaeskey, OPENSSL_RAW_DATA, $myvi);
echo base64_encode($myencrypted) . "\n";
$mydecryted = openssl_decrypt($myencrypted, 'DES-CBC', $myaeskey, OPENSSL_RAW_DATA, $myvi);
echo $mydecryted . "\n";
