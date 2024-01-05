@extends('layout')
@section('content')
<div class="text-title" style="padding-bottom: 20px">
    Đóng góp ý kiến
</div>
<div class="map-section" data-aos="fade-up"  data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d284.97663678961624!2d108.23682218772721!3d16.056493507402646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTbCsDAzJzIzLjQiTiAxMDjCsDE0JzEzLjAiRQ!5e0!3m2!1svi!2s!4v1704123950837!5m2!1svi!2s"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Start Contact Details -->
                <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up"  data-aos-delay="0">
                    <div class="contact-details">
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <a href="tel:0896480166">0896480166</a>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <a href="mailto:quangnt.22itb@vku.udn">quangnt.22itb@vku.udn.vn</a>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <span>K240/16 Phạm Cự Lượng</span>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                    </div>
                    <!-- Start Contact Social Link -->
                    <div class="contact-social">
                        <h4>Theo dõi chúng tôi</h4>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div> <!-- End Contact Social Link -->
                </div> <!-- End Contact Details -->
            </div>
            <div class="col-lg-8">
                <div class="contact-form section-top-gap-100" data-aos="fade-up"  data-aos-delay="200">
                    <h3>Đóng góp ý kiến (có thể ẩn danh)</h3>
                    <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                    <form id="contact-form" action="{{ URL::to('/add-contact') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-name">Tên </label>
                                    <input name="name_contact" type="text" id="contact-name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-email">Email</label>
                                    <input name="email_contact" type="email" id="contact-email">
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-message">Ý kiến</label>
                                    <textarea name="message_contact" id="contact-message" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-lg btn-black-default-hover" type="submit" name="btn-contact">Gửi</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection