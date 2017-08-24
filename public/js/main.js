/**
 * Created by mhr on 24-Aug-17.
 */

$('.interaction').on('click',function(){
    console.log('asdfsdfasdf');
});

$('.post').find('.update-post').find('.edit').on('click',function(event){
    console.log('asdfsdfasdf');

    event.preventDefault();
    var body = $(this).parent().parent().find('.post-para').text();

    console.log(body);

    $('#update-post-body').val(body.trim());

    $('#edit-post-modal').modal();


    //var URL = '/edit';
    var postId = $(this).parent().parent().find('#post-id').val();
    var token = $('#token').val();


    console.log(postId+" "+token);

    $('#save-button').on('click',function(e){
        e.preventDefault();

        console.log("== "+postId+" "+token+" "+URL);

        $.ajax({
            method: 'POST',
            url :URL,
            data : {body :body,postId:postId,_token:token}
        }).done(function(msg){
            console.log(msg['message']);
        });


    });

});