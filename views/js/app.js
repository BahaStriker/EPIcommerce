$(document).ready(function(){

  $('.menu-icon').click(function(e){
  e.preventDefault();

  $("#wrapper").toggleClass("menuDisplayed");

  $this = $(this);
  if($this.hasClass('is-closed')){
    $this.removeClass('is-closed').addClass('is-opened');
  }else{

      $this.addClass('is-closed').removeClass('is-opened');
  }
})
});
