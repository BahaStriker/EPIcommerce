$('.item').each(function(i){
setTimeout(function(){
$('.item').eq(i).addclass('is-visible');

}, 200 * i);
});
