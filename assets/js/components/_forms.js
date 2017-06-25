// $('input, textarea')
//     .focus(function () {
//         $(this).data('placeholder', $(this).attr('placeholder')).attr('placeholder', '');
//     })
//     .blur(function () {
//         $(this).attr('placeholder', $(this).data('placeholder'));
//     });
// $(document).bind('gform_confirmation_loaded', function (event, formId) {
//     setTimeout(function () {
//         $('.do-form-reload').fadeOut();
//     }, 5000);
//     setTimeout(function () {
//         $.get('/wp-admin/admin-ajax.php?action=vg_get_form&form_id=' + formId, function (response) {
//             $('.do-form-reload').html(response).fadeIn();
//         });
//     }, 5500);
// });
