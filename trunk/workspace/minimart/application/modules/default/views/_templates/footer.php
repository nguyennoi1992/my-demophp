<div class="clr"></div>
<div id="copyright"><span>&copy; 2014 Minimart.com.vn - Siêu thị gia đình trực tuyến!</span></div>
    <div id="footer">
        <div class="box_footer" id="address_footer">
            <h3>Công ty TNHH KDC</h3>
            Địa chỉ: Tầng 5 Tòa nhà Sentinel Place,<br/>
            41A Lý Thái Tổ, Hoàn Kiếm, Hà Nội.<br/>
            Tel: 04 66867668<br/>
          	Email: sales@minimart.com.vn<br/>
            Website: <a href="www.minimart.com.vn">www.minimart.com.vn</a>
        </div><!--box_footer-->
        <div class="box_footer">
            <h3>Thông tin Minimart</h3>
            <ul>
                <li><a href="/page/bao-chi-viet-ve-chung-toi">Báo chí viết về chúng tôi</a> </li>
                <li><a href="/page/y-kien-khach-hang">Ý kiến khách hàng</a> </li>
                <li><a href="/tin-tuc">Tin tức</a> </li>
                <li><a href="/lien-he">Liên hệ</a> </li>
            </ul>
        </div><!--box_footer-->
        <div class="box_footer">
            <h3>Hỗ trợ khách hàng</h3>
            <ul>
                <li><a href="/page/huong-dan-chon-hang">Hướng dẫn chọn hàng</a> </li>
                <li><a href="/page/huong-dan-mua-hang">Hướng dẫn mua hàng</a> </li>
                <li><a href="/page/chinh-sach-van-chuyen">Chính sách vận chuyển</a> </li>
                <li><a href="/page/chinh-sach-doi-tra-hang">Chính sách đổi trả hàng</a> </li>
            </ul>
        </div><!--box_footer-->
        <div class="box_footer">
            <h3>Kết nối với Minimart</h3>
            <div id="social_footer">
              <a href="http://www.facebook.com/minimart.com.vn"><img src="/template/default/images/icon_facebook.png" alt="Minimart.com.vn" /> </a>
                <a href=""><img src="/template/default/images/icon_twitter.png" alt="Minimart.com.vn" /> </a>
                <a href=""><img src="/template/default/images/icon_google.png" alt="Minimart.com.vn" /> </a>
            </div>
        </div><!--box_footer-->
        <div class="box_footer">
            <h3>Chấp nhận thanh toán</h3>
            <a href=""><img src="/template/default/images/icon_pay.png" alt="" /> </a>
        </div><!--box_footer-->
    </div>
    <div class="clr"></div>
<script> 
  
  function subscribe_newsletter(){
  var email = document.getElementById('email_newsletter').value;
  if(email.length > 3){
  $.post("/ajax/register_for_newsletter.php", {email:email}, function(data) {
  if(data=='success') {alert("Quý khách đã đăng ký thành công "); }
  else if(data=='exist'){ alert("Email này đã tồn tại");}
  else { alert('Lỗi xảy ra, vui lòng thử lại '); }
  
  });
  }else{alert('Vui lòng nhập địa chỉ email');}
  }
  
  $(document).ready(function(){
  	$(".close_letter").click(function(){
  		$("#news_letter_fix").fadeOut();
  		return false;
  	});
  	$("#icon_mail_fix").click(function(){
  		$("#news_letter_fix").fadeIn();
  	});
  });
</script>

<!--div id="icon_mail_fix"></div>
<div id="news_letter_fix">
  <a href="" class="close_letter"></a>
  <p>Vui lòng điền điền thông tin email của bạn để nhận bản tin khuyến mãi sớm nhất</p>
  <input type="text" id="email_newsletter" placeholder="Email của bạn" />
  <a href="javascript:subscribe_newsletter()">Đăng ký</a>
</div-->
       
  </div>