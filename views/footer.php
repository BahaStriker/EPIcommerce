
<script type="text/javascript" src="style/js/owl.carousel.min.js"></script>
<script>
     $('.owl-carousel').owlCarousel({
       margin:15,
       loop:true,
       autoWidth:true,
       items:3
   })
</script>
<script type="text/javascript" src="style/js/app.js"></script>
<script type="text/javascript" src="style/js/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="style/js/twitter.js"></script>
<script type="text/javascript" src="style/js/core.min.js"></script>

<script>
var $progress = $('.progress');
var $progressBar = $('.progress-bar');
var $b = $('.b');
var $s = $('.s');
var $carr = $('.card')
setTimeout(function() {
    $progressBar.css('width', '10%');
    setTimeout(function() {
        $progressBar.css('width', '30%');
        setTimeout(function() {
            $progressBar.css('width', '100%');
            setTimeout(function() {
                $progress.css('display', 'none');
              $s.css('width', '100%');
								 $s.css('height', '100%');
								 $b.css('opacity', '1');
              $carr.css('opacity', '1');

            }, 500); // WAIT 5 milliseconds
        }, 2000); // WAIT 2 seconds
    }, 1000); // WAIT 1 seconds
}, 1000); // WAIT 1 second
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
});
 </script>
 <script type="text/javascript">
 var $search = $('.sear');
 $(".btnn").click( function (h) {
   h.preventDefault();
$("search").toggle();

})
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});;
 </script>
<footer class="bg-primary">
<div class="container">
  <a class="btn btn-circle btn-social-icon btn-bitbucket"><i class="fa fa-bitbucket"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-dropbox"><i class="fa fa-dropbox"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-flickr"><i class="fa fa-flickr"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-github"><i class="fa fa-github"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-pinterest"><i class="fa fa-pinterest"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-tumblr"><i class="fa fa-tumblr"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
  						<a class="btn btn-circle btn-social-icon btn-vk"><i class="fa fa-vk"></i></a>

<div class="CR">
Nexus Shop &copy; - Copyright
</div>
</footer>
</body>
</html>
