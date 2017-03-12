<script type="text/javascript" src="style/js/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
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

$search.css('width', '250px');

document.getElementsByName('search')[0].placeholder='Search';

});
 </script>
<footer class="bg-primary">
<div class="container">
<div class="row">
<div class="col-md-4">
<ul>
Consoles
<li><a href="#">Xbox</a></li>
<li><a href="#">PlayStation</a></li>
<li><a href="#">Nintendo</a></li>
<li><a href="#">PC</a></li>
</ul>
</div>
<div class="col-md-4">
<ul>
	Categorys
<li><a href="#">Sports</a></li>
<li><a href="#">MMORPG</a></li>
<li><a href="#">Moba</a></li>
<li><a href="#">FPS</a></li>
<li><a href="#">RPG</a></li>
<li><a href="#">Action</a></li>
<li><a href="#">Platform</a></li>
</ul>
</div>
<div class="col-md-4">
<ul>
Games Top 10
<li><a href="#">Uncharted 4: A Thief`s End</a></li>
<li><a href="#">Overwatch</a></li>
<li><a href="#">Forza Horizon 3</a></li>
<li><a href="#">XCOM 2</a></li>
<li><a href="#">Battlefield 1</a></li>
<li><a href="#">The Division</a></li>
<li><a href="#">Titanfall 2</a></li>
<li><a href="#">The Last Guardian</a></li>
<li><a href="#">Ratchet & Clank</a></li>
<li><a href="#">DOOM</a></li>
</div>
</div>
</div>
<div class="CR">
Nexus Shop &copy; - Copyright
</div>
</footer>
</body>
</html>