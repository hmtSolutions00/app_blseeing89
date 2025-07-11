<script
  src="https://maps.googleapis.com/maps/api/js?center=Jakarta,Indonesia&zoom=13&size=600x300"
></script>

  <script src="{{url('/assets/unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js')}}"></script>

  <script src="{{url('assets/js/vendors.js')}}"></script>
  <script src="{{url('assets/js/main.js')}}"></script>
  <script src="{{url('assets/js/lang.js')}}"></script>
<div id="google_translate_element" style="display:none;"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'en,id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    document.querySelectorAll('.lang-option-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const lang = this.dataset.lang;
            const cookieValue = '/id/' + lang;
            setCookie('googtrans', cookieValue, 1);
            window.location.reload();
        });
    });
</script>
  @stack('custom_js')


