var selected = false;
var emailsArray = [];
$(document).ready(function () {
/**
 *	Stores data in Bootstrap Modal
 **/
    $(".history-tile").click(function () {
        $("#myModalLabel").text($(this).find('#Subject').text());
        $(".modal-recipient").text($(this).find('#Recipients').text());
        $(".modal-message").text($(this).find('#Message').text());
    });
});
/**
 * Form Validation
 **/
function formValidation() {
    $('#contact-form').validate({
        rules: {
            message: {
                required: true
            },
            subject: {
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
    });
}
/**
 * sends email by ajax request
 **/
function sendEmailAsAjaxRequest(emailId) {
    var subject = $('#subject').val();
    var message = $('#message').val();
    $.ajax({
        type: 'POST',
        url: './mail-api.php',
        data: {
            email: '' + emailId + '',
            subject: '' + subject + '',
            message: '' + message + ''
        },
        success: function (results) {
            console.log(results);
        }
    });
}
/**
 * updates temporary message , updates progress bar
 **/
function updateTempData(msgString, w) {
    $('#temp_message').html(msgString);
    $('#progress_bar').css('width', w + '%')
}
/**
 * makes an array of email ids and sends the email
 **/
function updateEmailArray() {
    $('.check:checked').each(function () {
        if ($(this).val().length != 0) {
            emailsArray.push($(this).val());
        }
    });
}
/**
 * sends email to all the emails in array
 **/
function sendEmails() {
    emailsArray = [];
    var count = 1;
    formValidation();
    updateEmailArray();
    if (emailsArray.length > 0 && $('#subject').val().length != 0 && $('#message').val().length != 0) {
        $(".progress").css("display", "block");
        $('#temp_message').html("Sending messages ...");
        emailsArray.forEach(function (emailId) {
            var msgString = count + " of " + emailsArray.length + " messages send";
            var w = (count / emailsArray.length) * 100;
            setTimeout(function () {
                updateTempData(msgString, w);
            }, 500)
            sendEmailAsAjaxRequest(emailId);
            count++;
        });
        $('#temp_message').html("All messages send :) ");
    }
}
/**
 * updates email text box on every click of check box
 **/
function updateEmailAddress(box) {
    if ($('#emailId').val() != "") {
        if ($('#emailId').val().indexOf(box.value) > -1) {
            $('#emailId').val($('#emailId').val().replace(box.value, ""));
        } else {
            $('#emailId').val($('#emailId').val() + " , " + box.value);
        }
    } else {
        $('#emailId').val(box.value);
    }
}
/**
 * updates email text box to the current values of email array
 **/
function updateEmailAddressValues() {
    updateEmailArray();
    $('#emailId').val("");
    emailsArray.forEach(function (value) {
        if ($('#emailId').val() != "") {
            $('#emailId').val($('#emailId').val() + " , " + value);
        } else {
            $('#emailId').val(value);
        }
    });
}
/**
 * resets entire page to send new email
 **/
function reset() {
    $('#temp_message').html("");
    $('#progress_bar').css('width', '0%');
    $(".progress").css("display", "none");
    $('.check').each(function () {
        $('.check').prop('checked', false);
    });
    $('.select_all').prop('checked', false);
    selected = false;
    $('#emailId').val("");
    $('#subject').val("");
    $('#message').val("");
}
/**
 * used to toggle select all
 **/
function toggle() {
    selected = !selected;
    $('.check').each(function () {
        $('.check').prop('checked', selected);
    });
    if (selected) {
        updateEmailAddressValues();
    } else {
        $('#emailId').val("");
    }
}
