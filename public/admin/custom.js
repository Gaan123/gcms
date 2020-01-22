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

