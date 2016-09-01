</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        function calcTop() {
            var h1 = $("header .section-title h1");
            var pageTitle = $("h1.page-title").first();
            var inEffect = "slideInUp";
            var outEffect = "slideOutDown";

            if($(window).scrollTop() > 40) {
                h1.removeClass(outEffect);
                if(!h1.hasClass(inEffect)) {
                    h1.text(pageTitle.text());
                    h1.addClass("animated "+inEffect);
                    pageTitle.addClass("hidden");
                }
            }
            else {
                h1.removeClass(inEffect);
                if(!h1.hasClass(outEffect)) {
                    h1.addClass("animated "+outEffect);
                    pageTitle.removeClass("hidden");
                }
            }
        }

        calcTop();
        $(window).scroll(function() {
            calcTop();
        });
    })
</script>