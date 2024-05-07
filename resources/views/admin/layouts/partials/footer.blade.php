<footer class="main-footer" style="margin: -20px 0px;">
    <!-- To the right -->
    <div class="row">
      <div class="col-md-9">
          <div style="text-align: center; font-weight:bold">
              @if (@$sitesetting->{'footer_'. app()->getLocale()} )
                  {!! $sitesetting->{'footer_'. app()->getLocale()} !!}
              @else
                  {{(app()->getLocale() == 'en') ? 'Copyright © 2023 Expatriate Smart Centre - ESC, All rights reserved.' : 'প্রবাস স্মার্ট সেন্টার জন্য কপিরাইট © ২০২৩ ডকুমেন্টেশন। সমস্ত অধিকার সংরক্ষিত.'}}
              @endif
          </div>
      </div>
      <div class="col-md-3">
          <div style="text-align: center;">
              <img src="{{ asset('site/assets/images/np-logo-set.png') }}" title="{{(app()->getLocale() == 'en') ? 'Planning and Implementation' : 'পরিকল্পনা ও বাস্তবায়ন'}}">
          </div>
      </div>
    </div>    
</footer>