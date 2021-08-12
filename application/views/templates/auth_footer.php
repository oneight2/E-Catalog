<script type="text/javascript" src="<?= base_url('assets/') . 'ajax/js/jquery-3.2.1.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/') . 'ajax/js/bootstrap.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/') . 'ajax/js/jquery.dataTables.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/') . 'ajax/js/dataTables.bootstrap4.js' ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


<script>
	$('#pengajuan').dataTable();
	$('#pengajuan-selesai').dataTable();

	$('#upload-storyboard').on('change', function() {
		//get the file name
		var fileName = $(this).val().split('\\').pop();
		console.log(fileName)
		//replace the "Choose a file" label
		$(this).next('.custom-file-label').html(fileName);
	})


	// setInterval(function(){
	//   $( "#pengajuan" ).load( "home #pengajuan" );
	//  	}, 9000);
	//refresh every 2 seconds

	if (/Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		// some code..
		$('#btn-pengajuan').attr('class', 'btn btn-block btn-primary mb-3');
		$('#btn-perbaikan').attr('class', 'btn btn-block btn-danger mb-3');
		$('#card-menunggu').removeClass('py-2 h-100')
		$('#card-dikerjakan').removeClass('py-2 h-100')
		$('#card-selesai').removeClass('py-2 h-100')
		$('#container').removeClass('container-fluid')
		$('#container').addClass('ml-1 mr-1')
		$('#perhatian').addClass('text-center')
		$('.card-status').removeClass('col-xl-4 col-md-6').addClass('col')
		$('.icon').remove('.icon')
		$('.p-5').removeClass('p-5').addClass('px-3 py-5')
	}
</script>


</body>

</html>