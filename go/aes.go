package main

import (
	"bytes"
	"crypto/aes"
	"crypto/cipher"
	"encoding/base64"
	"encoding/json"
	"fmt"
)

const aesKey = "12345678901234567890123456789012"

func AesEncrypt(v interface{}) (string, error) {
	origData, err := json.Marshal(v)
	if err != nil {
		return "", err
	}

	key := []byte(aesKey)
	block, err := aes.NewCipher(key)
	if err != nil {
		return "", err
	}
	blockSize := block.BlockSize()
	origData = PKCS7Padding(origData, blockSize)
	blockMode := cipher.NewCBCEncrypter(block, key[:blockSize])
	crypted := make([]byte, len(origData))
	blockMode.CryptBlocks(crypted, origData)

	return base64.StdEncoding.EncodeToString(crypted), nil
}

func AesDecrypt(base64string string) (r interface{}, err error) {
	crypted, err := base64.StdEncoding.DecodeString(base64string)
	if err != nil {
		return nil, err
	}

	key := []byte(aesKey)
	block, err := aes.NewCipher(key)
	if err != nil {
		return nil, err
	}

	blockSize := block.BlockSize()
	blockMode := cipher.NewCBCDecrypter(block, key[:blockSize])
	origData := make([]byte, len(crypted))
	blockMode.CryptBlocks(origData, crypted)
	origData = PKCS7UnPadding(origData)

	err = json.Unmarshal(origData, &r)
	return r, err
}

func PKCS7Padding(cipherText []byte, blockSize int) []byte {
	padding := blockSize - len(cipherText)%blockSize
	padText := bytes.Repeat([]byte{byte(padding)}, padding)
	return append(cipherText, padText...)
}

func PKCS7UnPadding(origData []byte) []byte {
	length := len(origData)
	unPadding := int(origData[length-1])
	return origData[:(length - unPadding)]
}

func main()  {
	fmt.Print(AesDecrypt("vyIDWUzyt/YjV5iNTdeBTTVQBDpp6EUdFmJZu/Tod7LtXqge5Yq4IbCWbIsw/SMaEQPuy6th5+c03rAitS24iTSZoVPel42046JqWeL8pL8EmxtNjQ4iwUZGkCFBrtku"))
}
