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
    Dropzone.autoDiscover = false;
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
/*
*Dropzone
 */
Dropzone.options.dropUpload = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
        done();
        // if (file.name == "justinbieber.jpg") {
        //     done("Naha, you don't.");
        // }
        // else {
        //     done();
        // }
    },
    addRemoveLinks:true,
    autoDiscover:false,
    init: function() {
        this.on("complete", function(file) {
            let self=this;
           setTimeout(function () {
               self.removeFile(file);
           },1500)
        });
    }
};

// Image Set
$('.set-image').click(e=>{
    const imageUrl=$('.media-image:checked').data('image');
    const image=`
                <img src="${imageUrl}" alt="Featured Image" class="img-fluid">
                <a href="#" class="featured_image-remove">Remove Image</a>
                `;
    $('.featured_image-select').html(image);
});

$(document).on('click', '.featured_image-remove', function()
{
    $('.featured_image-select').html('<a href="#" data-toggle="modal" data-target="#modal-xl">Set Featured Image</a>');
});
