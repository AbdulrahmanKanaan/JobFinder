const URLROOT = 'http://localhost/jobfinder';
var deletedId;

$(function () {

    // Digital Clock
    clockUpdate();
    setInterval(clockUpdate, 1000);

    // placeholder disappear on focusing
    $('input, textarea').focus(function(){
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder','');
    }).blur(function(){
        $(this).attr('placeholder',$(this).attr('data-text'));
    });

    // delete mini CV | save the id of the deleted mini cv in a var to use in ajax call
    $(document).on("click", '.delete_modal', function(){
        deletedId = $(this).siblings('.hiddenId').val();
    });

    // password change
    $('#pwdFlagButton').click(function () {
        var flag = $('#pwdFlag').val();
        if(flag == "0"){
            $("#pwdFlag").val('1');
            $('#oldPassword').attr('required', true);
            $('#newPassword').attr('required', true);
            $('#confirmNewPassword').attr('required', true);
        } else if (flag == "1") {
            $("#pwdFlag").val('0');
            $('#oldPassword').attr('required', false);
            $('#newPassword').attr('required', false);
            $('#confirmNewPassword').attr('required', false);
        }
    });

    // birth date
    fillDays();
    fillYears();
    monthChanged();
    $('#b_month').change(monthChanged);
    $('#b_year').change(monthChanged);

});

// Digital Clock
function clockUpdate(){
    var date = new Date();
    var h = date.getHours() > 9 ? date.getHours() : '0' + date.getHours();
    var m = date.getMinutes() > 9 ? date.getMinutes() : '0' + date.getMinutes();
    var s = date.getSeconds() > 9 ? date.getSeconds() : '0' + date.getSeconds();
    $('.digital-clock').html( '<i class="fa fa-clock"></i> ' + h + ':' + m + ':' + s);
}

// Ajax call to delete the mini CV
function deleteMiniCv() {
    $.ajax({
        type: "POST",
        url: URLROOT + "/cvs/delete",
        data: {
            'id': deletedId
        },
        // dataType: "dataType",
        success: function (response) {
            $('#cards').html(response);
            if(response !== "Access Denied!") {
                $('#cv_delete').html('<div class="alert alert-warning alert-dismissible fade show" role="alert">Mini Cv Deleted Successfully!' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '</div>');
            }
        }
    });
}

// date select box
function monthChanged() {
    var days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    var month = $('#b_month').val() - 1, year = +$('#b_year').val();
    var diff;

    // Check for leap year if Feb
    if (month == 1 && new Date(year, month, 29).getMonth() == 1) days[1]++;

    // Add/Remove options
    diff = $('#b_day option').length - (days[month] + 1);
    if (diff > 0) { // Remove
        $('#b_day option').slice(days[month] + 1).remove();
    } else if (diff < 0) { // Add
        for (var i = $('#b_day option').length; i <= days[month]; i++) {
            $('<option>').attr('value', i).text(i).appendTo('#b_day');
        }
    }
}
function fillDays() {
    for(var i=1; i<=31; i++) {
        $('#b_day').html($('#b_day').html() + '<option value="' + i + '">' + i + '</option>');
    }
}

function fillYears() {
    for(var i=1920; i<=new Date().getFullYear(); i++) {
        $('#b_year').html($("#b_year").html() + '<option value="' + i + '">' + i + '</option>');
    }
}