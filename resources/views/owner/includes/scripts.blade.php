<!--- Clender js -->
{{-- <script src="{{asset('/')}}assets/js/app-calendar.js"></script> --}}
<!--- JQuery min js -->

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--- Datepicker js -->
{{-- <script src="{{asset('/')}}assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script> --}}

<!--- Bootstrap Bundle js -->
<script src="{{asset('/')}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--- Ionicons js -->
<script src="{{asset('/')}}assets/plugins/ionicons/ionicons.js"></script>

<!--- Internal jquery.maskedinput js -->
<script src="{{asset('/')}}assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

<!--- Internal Spectrum-colorpicker js -->
<script src="{{asset('/')}}assets/plugins/spectrum-colorpicker/spectrum.js"></script>

<!--- Chart bundle min js -->
<script src="{{asset('/')}}assets/plugins/chart.js/Chart.bundle.min.js"></script>
<!--- Internal Sampledata js -->
<script src="{{asset('/')}}assets/js/chart.flot.sampledata.js"></script>
<!--- Index js -->
<script src="{{asset('/')}}assets/js/index.js"></script>

<!--- Moment js -->
<script src="{{asset('/')}}assets/plugins/moment/moment.js"></script>

<!--- JQuery sparkline js -->
<script src="{{asset('/')}}assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!--- Perfect-scrollbar js -->
<script src="{{asset('/')}}assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('/')}}assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!--- Rating js -->
<script src="{{asset('/')}}assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="{{asset('/')}}assets/plugins/rating/jquery.barrating.js"></script>

<!--- Custom Scroll bar Js -->
<script src="{{asset('/')}}assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<!--- Sidebar js -->
<script src="{{asset('/')}}assets/plugins/side-menu/sidemenu.js"></script>

<!--- Right-sidebar js -->
<script src="{{asset('/')}}assets/plugins/sidebar/sidebar.js"></script>
<script src="{{asset('/')}}assets/plugins/sidebar/sidebar-custom.js"></script>

<!--- Eva-icons js -->
<script src="{{asset('/')}}assets/js/eva-icons.min.js"></script>
<!-- form-elements js -->
<script src="{{asset('/')}}assets/js/form-elements.js"></script>
<!--- Scripts js -->
<script src="{{asset('/')}}assets/js/script.js"></script>

<!--- Custom js -->
<script src="{{asset('/')}}assets/js/custom.js"></script>

<!--- Switcher js -->
<script src="{{asset('/')}}assets/switcher/js/switcher.js"></script>

<script src="{{asset('/')}}assets/plugins/select2/js/select2.min.js"></script>

<!--- Internal ion.rangeSlider.min js -->
<script src="{{asset('/')}}assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!--- Internal jquery-simple-datetimepicker js -->
<script src="{{asset('/')}}assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
<!--- Ionicons js -->
<script src="{{asset('/')}}assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<!--- Internal Pickerjs js -->
<script src="{{asset('/')}}assets/plugins/pickerjs/picker.min.js"></script>


<!--- Internal Jquery.steps js -->
<script src="{{asset('/')}}assets/plugins/jquery-steps/jquery.steps.min.js"></script>
<script src="{{asset('/')}}assets/plugins/parsleyjs/parsley.min.js"></script>
<!--- Internal Form-wizard js -->
<script src="{{asset('/')}}assets/js/form-wizard.js"></script>

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

@yield('js')
