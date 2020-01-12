$(function () {
    // Summernote
    $('.wysiwyg').summernote({
        tabsize: 2,
        height: 350
    });
    if ($('#toast-container').length){
        setTimeout(()=>{
            $('#toast-container').fadeOut();
            $('#toast-container').remove();

        },4000)
    }

});
//Add action when delete button is clicked and delete modal open
$('.delete-item').click(function (e){
    e.preventDefault();
    const deleteRoute=$(this).data('route');
    $('#deleteForm').attr('action',deleteRoute);
});
$("#customCheckboxSelectAll").click( function(){
    if( $(this).is(':checked') ){
        $('.custom-control-input').prop('checked',true);
    }else{
        $('.custom-control-input').prop('checked',false);
    }
});
$('.post_ids').click(e=>{
    $("#customCheckboxSelectAll").prop('checked',false);
})

