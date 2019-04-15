@extends('master')
@section('content')
<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Contacts</h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <a href="index">Home</a> / <span>Contacts</span>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="beta-map">

  <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.1258149919886!2d106.7122431!3d10.8016747!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a45473e661%3A0x153af9f70389a6dd!2zNDc1IMSQaeG7h24gQmnDqm4gUGjhu6csIFBoxrDhu51uZyAyNSwgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1554039430130!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<div class="container">
  <div id="content" class="space-top-none">

    <div class="space50">&nbsp;</div>
    <div class="row">
      <div class="col-sm-8">
        <h2>Contact Form</h2>
        <div class="space20">&nbsp;</div>
        <p>Nhập thông tin cần thiết, chúng tối sẽ liên hệ lại với bạn.</p>
        <div class="space20">&nbsp;</div>
        <form action="#" method="post" class="contact-form">
          <div class="form-block">
            <input name="your-name" type="text" placeholder="Your Name (required)">
          </div>
          <div class="form-block">
            <input name="your-email" type="email" placeholder="Your Email (required)">
          </div>
          <div class="form-block">
            <input name="your-subject" type="text" placeholder="Subject">
          </div>
          <div class="form-block">
            <textarea name="your-message" placeholder="Your Message"></textarea>
          </div>
          <div class="form-block">
            <button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
          </div>
        </form>
      </div>
      <div class="col-sm-4">
        <h2>Contact Information</h2>
        <div class="space20">&nbsp;</div>

        <h6 class="contact-title">Address</h6>
        <p>
          475A Điện Biên Phủ St,<br>
          25 Ward, Bình Thạnh District <br>
          HoChiMinh.<br>
          <a href="tel:+8428 5445 7777">028 5445 7777</a>
        </p>
        <div class="space20">&nbsp;</div>
        <h6 class="contact-title">Business Enquiries</h6>
        <p>
          Coffee business website.<br>
          <a href="">ak@gmail.com/a>
        </p>
        <div class="space20">&nbsp;</div>
        <h6 class="contact-title">Employment</h6>
        <p>
          We’re always looking for talented persons to <br>
          join our team. <br>
          <a href="">ak@gmail.com</a>
        </p>
      </div>
    </div>
  </div> <!-- #content -->
</div> <!-- .container -->
@endsection
