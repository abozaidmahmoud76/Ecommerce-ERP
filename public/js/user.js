

$(window).on('load',function () {

    //check all checkbox
    function check_all() {
        $('.item_checkbox').each(function () {
            if($('.check_all').is(':checked')){
                $(this).attr('checked',true);
            }else{
                $(this).attr('checked',false);
            }
        });
    }


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

    //submit form delete
    $('.submitBtn_del').on('click',function () {
<<<<<<< HEAD
        $('#formDeleteAdmin').submit();
=======
        $('#formDeleteUser').submit();
>>>>>>> dee9722b63078bb34fcfccb4ebc0c7fb25303f2d
    });

    //add new member

<<<<<<< HEAD
    $(document).on('click','.add_member',function () {

        window.location.href='user/create';
=======
    $('.add_member').on('click',function () {
       window.location.href='user/create';
>>>>>>> dee9722b63078bb34fcfccb4ebc0c7fb25303f2d
    });



<<<<<<< HEAD


=======
>>>>>>> dee9722b63078bb34fcfccb4ebc0c7fb25303f2d
});



