

$(window).on('load',function () {
    //check all checkbox


    //delete record
    $(document).on('click','.delBtn',function () {
        $('#deleteModel').modal('show');
        var records_checked=$('.item_checkbox:checked').length;
        $('.item_deleted_count').text(records_checked);
        if(records_checked>0){
            $('.no_record_delete').attr('hidden',true);
            $('.record_delete').attr('hidden',false);
            $('.yes').attr('disabled',false);
            $('.no').attr('disabled',false);
        }else{
            $('.record_delete').attr('hidden',true);
            $('.no_record_delete').attr('hidden',false);
            $('.yes').attr('disabled',true);
            $('.no').attr('disabled',false);
        }

    });

    $('#check_all').on('click',function () {
        $('.item_checkbox').each(function () {
            if($('.check_all').is(':checked')){
                $(this).attr('checked',true);
            }else{
                $(this).attr('checked',false);
            }
        });
    });

    //submit form delete
    $('.submitBtn_del').on('click',function () {
        $('#formDeleteCountry').submit();
    });

    //add new member

    $(document).on('click','.add_country',function () {
        window.location.href='countries/create';
    });





});



