<?php

/*require __DIR__ . "/OpenSSLAES.php";

$aes = new OpenSSLAES('12345678');

$encrypted = $aes->encrypt('凭栏知潇雨');
// KSGYvH0GOzQULoLouXqPJA==
echo '要加密的字符串：凭栏知潇雨<br>加密后的字符串：', $encrypted, '<hr>';

$decrypted = $aes->decrypt($encrypted);

echo '要解密的字符串：', $encrypted, '<br>解密后的字符串：', $decrypted;*/



$appid = 'wx4f4bc4dec97d474b';
$sessionKey = 'tiihtNczf5v6AKRyjwEUhQ==';

$encryptedData="CiyLU1Aw2KjvrjMdj8YKliAjtP4gsMZM
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

echo $decrypted;
