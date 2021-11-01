<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="footer-info">
            <h3>{{ zactra::translate_lang('Credit Repair') }}</h3>
            {{ zactra::site('address') }} <br>
            <br>
            <strong>{{ zactra::translate_lang('Phone:') }}</strong> {{ zactra::site('phone') }}<br>
            <strong>{{ zactra::translate_lang('Email:') }}</strong> {{ zactra::site('email') }}<br>
            <div class="social-links mt-3">
              <a href="{{ zactra::site('twitter_link') }}" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="{{ zactra::site('facebook_link') }}" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="{{ zactra::site('instagram_link') }}" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="{{ zactra::site('skype_link') }}" class="google-plus"><i class="fa fa-skype"></i></a>
              <a href="{{ zactra::site('linkedin_link') }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <div class="dropdown mmb-20">
            <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ zactra::translate_lang('language') }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('owner.translation.change','english') }}">{{ zactra::translate_lang('English') }}</a>
              <a class="dropdown-item" href="{{ route('owner.translation.change','french') }}">{{ zactra::translate_lang('French') }}</a>
              <a class="dropdown-item" href="{{ route('owner.translation.change','spanish') }}">{{ zactra::translate_lang('Spanish') }}</a>
              <a class="dropdown-item" href="{{ route('owner.translation.change','german') }}">{{ zactra::translate_lang('German') }}</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 footer-links">
          <h4>{{ zactra::translate_lang('Useful Links') }}</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">{{ zactra::translate_lang('Home') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('whoWeAre') }}">{{ zactra::translate_lang('About us') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('contacts') }}">{{ zactra::translate_lang('Contact us') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('credit.education') }}">{{ zactra::translate_lang('Services') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('faqs') }}">{{ zactra::translate_lang('Faqs') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('pravicy') }}">{{ zactra::translate_lang('Privacy policy') }}</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 footer-links">
          <h4>{{ zactra::translate_lang('Other Links') }}</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('credit.repair') }}">{{ zactra::translate_lang('Credit Repair Resources') }} </a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('legalityCreditRepair') }}">{{ zactra::translate_lang('Legality Credit Repair') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('howItWorks') }}">{{ zactra::translate_lang('How It Work') }}</a></li>
            {{--
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('credit.free.repair') }}">{{ zactra::translate_lang('Free Credit Repair') }}</a></li>
            --}}
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('review.list') }}">{{ zactra::translate_lang('Reviews') }}</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog') }}">{{ zactra::translate_lang('News Room') }}</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>{{ zactra::translate_lang('Subscribe Us') }}</h4>
          <p>{{ zactra::translate_lang('You can any time unsubcribe your email address from your mail if this become annoying.') }}</p>
          <form action="{{ route('web.subscribe.prudent') }}" method="post">
            @csrf
            <input placeholder="{{ zactra::translate_lang('example@site.com') }}" type="email" name="email" /><input type="submit" value="{{ zactra::translate_lang('Subscribe') }}" />
          </form>
          <div class="feature-box15 mt-5 bmargin px-3 py-2" style="border: 3px solid #37c6f5;">
            <h4 style="color: white; font-family: corbel;">{{ zactra::translate_lang('how can we help you?') }}</h4>
            <p class="text-light">{{ zactra::translate_lang('Feel free to contact us at any time. We feel happy to serve for our customers.') }}</p>
            <a href="{{ route('contacts') }}" class="text-white">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                  <path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z"
                    stroke="#F63664" ></path>
                </g>
                <defs>
                  <clipPath id="clip0">
                    <rect width="16" height="16" fill="white"></rect>
                  </clipPath>
                </defs>
              </svg>
              {{ zactra::translate_lang('Contact Us') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="copyright">
      <p>{{ date('Y') }} &copy; {{ zactra::translate_lang('All Rights Reserved by') }} <a href="/" class="fs-14">{{ zactra::translate_lang('PRUDENT CREDIT SOLUTION') }}</a></p>
    </div>
  </div>
</footer>

<!--Alerts Script-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.1/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
       @if (session('success'))
       Swal.fire({
         title: 'Success',
         text: '{!! session("success") !!}',
         icon: 'success',
         confirmButtonText: 'Close'
       })
       @elseif (session('error'))
       Swal.fire({
         title: 'Error',
         text: '{!! session("error") !!}',
         icon: 'error',
         confirmButtonText: 'Close'
       })
       @elseif (session('info'))
       Swal.fire({
         title: 'Info',
         text: '{!! session("info") !!}',
         icon: 'info',
         confirmButtonText: 'Close'
       })
       @endif

     });
</script>
