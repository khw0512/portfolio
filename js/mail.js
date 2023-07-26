/*
email
 */

(function ($) {
    'use strict';
    
    $('#contact_form').on('submit', function (e) {
        e.preventDefault();
        var $this = $(this);

        $('input[type="submit"]', this).attr('disabled', 'disabled').val('Processing...');
        var form_data = $this.serialize();

        var required = 0;
        $(".required", this).each(function () {
            if ($(this).val() === ''){
                $(this).addClass('reqError');
                required += 1;
            } else{
                if ($(this).hasClass('reqError'))
                {
                    $(this).removeClass('reqError');
                    if (required > 0)
                    {
                        required -= 1;
                    }
                }
            }
        });

        if (required === 0) {
            $.ajax({
                type: 'POST',
                url: 'mail/mail.php',
                data: {form_data: form_data},
                success: function (data) {
                    $('input[type="submit"]', $this).removeAttr('disabled').val('이메일 보내기');

                    $('.con_message', $this).fadeIn().html('<strong>감사합니다!</strong> 담당자에게 메일이 전송되었습니다.').removeClass('alert-warning').addClass('alert-success');
                    setTimeout(function () {
                        $('.con_message', $this).fadeOut().html('').removeClass('alert-success alert-warning');
                    }, 5000);
                }
            });
        } else {
            $('input[type="submit"]', $this).removeAttr('disabled').val('이메일 보내기');
            $('.con_message', $this).fadeIn().html('<strong>죄송해요!</strong> 담당자에게 메일이 전송되지 않았습니다. 입력 사항을 모두 입력해 주세요.').removeClass('alert-success').addClass('alert-warning');
            setTimeout(function () {
                $('.con_message', $this).fadeOut().html('').removeClass('alert-success alert-warning');
            }, 5000);
        }

    });
})(jQuery);