<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.5
 * 日期：2016-06-25
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */
// http://test.wadao.com/dg/alipay/return_url.php?body=%E5%8D%B3%E6%97%B6%E5%88%B0%E8%B4%A6%E6%B5%8B%E8%AF%95&buyer_email=slw.plus%40gmail.com&buyer_id=2088202233070094&exterface=create_direct_pay_by_user&is_success=T&notify_id=RqPnCoPT3K9%252Fvwbh3InWe2eC0zxWIQDZGjm56JrqnRZtGRqJdutxaDjVlY5TBVg%252F2fyv&notify_time=2016-10-09+15%3A55%3A37&notify_type=trade_status_sync&out_trade_no=test20161009155501&payment_type=1&seller_email=caiwu%40wadao.com&seller_id=2088221922903909&subject=test%E5%95%86%E5%93%81123&total_fee=0.01&trade_no=2016100921001004090213900684&trade_status=TRADE_SUCCESS&sign=infr34hkwteGfkeNuNN9abZZMk1VvvDl6aYTtnscdYHi8lYLh9bgzfY3zVWPEOdmvPXoYTbL7aSwvK6haJ52S663mrN3MyT4UVpd0gZOG3W%2Fg5OSMUDT2e7myRiPmrH72K8VlsZDdQPyXjd272Ve2mWgtFJNRi3GRU6MmWAW62I%3D&sign_type=RSA
require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号
	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];


    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
		
	echo "验证成功<br />";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
?>
        <title>支付宝即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>