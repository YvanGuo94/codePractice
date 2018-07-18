var str = '{"summary":"哈哈- 到店后需支付300元作为住房押金,如房间内没有损坏,退房当天立即返还。哈哈"}'

var rtrim = /^[\s\uFEFF\xa0\u3000]+|[\uFEFF\xa0\u3000\s]+$/g

str = str.replace(rtrim, "")

JSON.parse(str)