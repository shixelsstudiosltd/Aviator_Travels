
<script src="js/bootstrap.js"></script>
<script src="js/slimmenu.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-timepicker.js"></script>
<script src="js/nicescroll.js"></script>
<script src="js/dropit.js"></script>
<script src="js/ionrangeslider.js"></script>
<script src="js/icheck.js"></script>
<script src="js/fotorama.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="js/typeahead.js"></script>
<script src="js/card-payment.js"></script>
<script src="js/magnific.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/fitvids.js"></script>
<script src="js/tweet.js"></script>
<script src="js/countdown.js"></script>
<script src="js/gridrotator.js"></script>
<script src="js/custom.js"></script>
<script>
   
    /**<input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text" id="flight_dep" name="destination" />
     <div class="dep_list_id" style="width: 100%;height:auto;position: absolute;top: 74px;">
     <ul class="dep_list_outcome">
     <li class="dep_li_code_select">The game </li>
     </ul>
     </div>***/
    function autocomplet(theId) {
        $('#' + theId).siblings('.dep_list_id').show();
//         $('.submitt').hide();
        var min_length = 3; // min caracters to display the autocomplete
        var keyword = $('#' + theId).val(); //alert(min_length);
        if (keyword.length >= min_length) {
            $.ajax({
                url: 'load_item.php',
                type: 'POST',
                data: {keyword: keyword},
                success: function (data) {
                    $('#' + theId).siblings('.dep_list_id').children('.dep_list_outcome').html(data);
                    $('.dep_li_code_select').on('click', function () {
                        $('#' + theId).val($(this).text());
                        $('#' + theId).siblings('.move_code').val($(this).children('.thecode').val());
                        $('#' + theId).siblings('.dep_list_id').children('.dep_list_outcome').remove();
//                        dep_li_code_select
                        return;
                    });
                }
            });
        } else {
            $('#list_outcome').hide();
        }
    }

    function doAlert() {
        alert(0);
    }

    
    $('#flight_dep').keyup(function () {//doAlert();
        autocomplet('flight_dep');
    });
    $('#flight_des').keyup(function () {
        autocomplet('flight_des');
    });
    $('.btn-select').on('click', function (e) {
        e.preventDefault();
    });
    $('.trip_tabs').on('click', function (e) {
       if($(this).attr('id') === 'trip_2_tab'){
          $('.trip_count').attr('value', 2);
//          alert($('.trip_count').attr('value'));
       } else {
            $('.trip_count').attr('value', 1);
//            alert($('.trip_count').attr('value'));
       }
        e.preventDefault();
    });
    
    $(".accord_hold").click(function () {
        $('.accord_body').hide();
        $('#accord_body-' + $(this).attr('rel')).show();
//        $('.d_arrow').hide();
//        $('.f_arrow').show();
//         $(this).children('.arr_images').children('.fl_arrow').removeClass('d_arrow');
//        $('.fl_arrow.d_ar').removeClass('d_ar').addClass('f_ar');
//         $(this).children('.arr_images').children('.fl_arrow').addClass('d_arrow');
////        $('.fl_arrow').addClass('f_arrow');
//        $(this).children('.arr_images').children('.fl_arrow').removeClass('f_ar');
//        $(this).children('.arr_images').children('.fl_arrow').addClass('d_ar');
//        $(this).children('.arr_images').children('.fl_arrow').removeClass('f_arrow');
//        $(this).children('.arr_images').children('.fl_arrow').addClass('d_arrow1');
        
//                   alert($(this).attr('rel'));
    });
    $
//    $('.d_arrow').hide();
//    $('.d_arrow:first').show();
//    $('.f_arrow:first').hide();
//    alert(0);
</script>