<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ShopifyNepal</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
      <style> body{width:650px;font-family:work-Sans,sans-serif;background-color:#f6f7fb;display:block;margin:0 auto;padding-top:50px;}a{text-decoration:none}span{font-size:14px}p{font-size:13px;line-height:1.7;letter-spacing:.7px;margin-top:0}.text-center{text-align:center}h6{font-size:16px;margin:0 0 18px}.template-sosial{display:flex;align-items:center;justify-content:center}.template-sosial li{background-color:#eff1f2;width:35px;height:35px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:15px}.template-sosial li:last-child{margin-right:0}.template-sosial li:hover{background-color:#1c9dea}.template-sosial li:hover a{color:#fff}.template-sosial li a i{font-size:14px}ul.logo{display:flex;justify-content:center;padding-left:0}ul.logo li{width:40px;height:40px;border:1px solid #000;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:10px}ul.logo li:last-child{margin-right:0} </style>
   
</head>
<body>
    <div style="width: 600px; padding: 15px; margin: 0 auto;">
        
        <div style="text-align: center; width: 200px; margin:  0 auto;">
            <img src="http://shopifynepal.com/asstes/images/logo.png" width="80" height="80" />
        </div>
        
        <h2 style="color: #d23600;">Hello <?= ucfirst(user()->fullname) ?>,</h2>
        <p>Your order confirmation details: <span style="color: #0b97c4;">
                #<?= $data['invoice_no'] ?>
            </span>
        </p>
        
        <table cellspacing="5" cellpadding="5" border="0" width="600" style="border: 1px solid #0a0a0a;">
            <tr style="background-color: #000000; color: #ffffff;">
                <th style="text-align: left;">Product Name</th><th>Unit Price</th><th>Quantity</th><th>Size</th>
                <th>Total</th>
            </tr>
            <?php foreach ($data['product'] as $item): ?>
                <tr>
                    <td width="400"><?= $item['name'] ?></td>
                    <td width="100">रु <?= $item['price'] ?></td>
                    <td width="50"><?= $item['quantity'] ?></td>
                    <td width="50"><?= $item['size'] ?></td>
                    <td width="50">रु <?= $item['total'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <h4>Total Amount: $<?= $data['total'] ?></h4>

       <p>We hope to see you again.</p>
        <h2>Shopify Nepal.</h2>

        <table border="0" cellpadding="0" cellspacing="0" style="max-width:650px;" width="100%">

        <tr>
                     <td class="containtTable" align="center" valign="top" style="padding-left:20px;padding-right:20px;">
                        <table>
                           <tr>
                              <td>
                                 <ul class="logo">
                                    <li><i class="fa fa-whatsapp"></i></li>
                                    <li><i class="fa fa-twitter"></i></li>
                                    <li><i class="fa fa-facebook"></i></li>
                                    <li><i class="fa fa-instagram"></i></li>
                                 </ul>
                              </td>
                           </tr>
                        </table>
                        <table class="tableTitleDescription" border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
                              <td class="description" align="center" valign="top" style="padding-bottom:20px;"> 
                                 <p class="text" style="color:#666666; font-family:"Open Sans", Helvetica, Arial, sans-serif; font-size:14px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none; text-align:center; padding:0; margin:0">Thank you for joining with Us, We have more than a 10k visiter Each Month, keeping you up to date with what&rsquo;s going on in the world Throught Online Store. Contact Us: (+977) 9823004203</p> 
                              </td>
                           </tr>
                        </table>
                        <table class="tableButton" border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
                              <td align="center" valign="top" style="padding-top:20px; padding-bottom:50px;">
                                 <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td class="ctaButton" align="center" style="background-color:#1c9dea;padding:15px 35px;"><a class="text" href="http://shopifynepal.com" target="_blank" style="color:#FFFFFF; font-family:"Poppins", Helvetica, Arial, sans-serif; font-size:13px; font-weight:600; font-style:normal;letter-spacing:1px; line-height:20px; text-transform:uppercase; text-decoration:none; display:block">Shop Now</a></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" style="max-width:650px;background-color:white;" width="100%">
         <tr>
            <td align="center" valign="top">
               <table class="footer" style="border:1px solid #E5E5E5; width:100% ; padding-bottom:30px;">
                  <tr>
                     <td class="socialLinks" style="float:center;" valign="top">
                        <ul class="template-sosial" style="margin-top:30px;">
                           <li><a href="https://www.facebook.com/profile.php?id=100072393161356"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="https://www.instagram.com/nepalshopify/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td align="center" valign="top" style="padding-top:10px;padding-bottom:5px;padding-left:10px;padding-right:10px;"> 
                        <p class="text" style="color:#777777; font-family:"Open Sans", Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;">&copy;&nbsp; Shopifynepal. | Nepal | Kathmandu | Mahabauddha.</p> 
                     </td>
                  </tr>
                  <tr>
                     <td align="center" valign="top" style="padding-top:0px;padding-bottom:20px;padding-left:10px;padding-right:10px;"> 
                        <p style="color:#777777; font-family:"Open Sans", Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;"><a href="#" style="color:#777777;text-decoration:underline;" target="_blank">View Web Version </a>&nbsp;|&nbsp;<a href="#" style="color:#777777;text-decoration:underline;" target="_blank"> Email Preferences </a>&nbsp;|&nbsp;<a href="#" style="color:#777777;text-decoration:underline;" target="_blank"> Privacy Policy </a></p> 
                     </td>
                  </tr>
                  <tr>
                     <td align="center" valign="top" style="padding-top:0px;padding-bottom:10px;padding-left:10px;padding-right:10px;"> 
                        <p class="text" style="color:#777777; font-family:"Open Sans", Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;">If you have any quetions please contact us <a href="#" style="color:#777777;text-decoration:underline;" target="_blank">info@shopifynepal.com.</a>
                        <br><a href="#" style="color:#777777;text-decoration:underline;" target="_blank">Unsubscribe</a> from our mailing lists</p> 
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>


    </div>
</body>
</html>

