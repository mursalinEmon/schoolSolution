</div>
<script src="<?php echo URL;?>public/js/jquery.min.js" ></script>
<script src="<?php echo URL;?>public/js/bootstrap.min.js" ></script>
<script src="<?php echo URL;?>public/js/jquery.easy-autocomplete.min.js"></script> 
<?php 
		if(isset($this->js)){
			foreach($this->js as $js){
				echo '<script src="'.URL.$js.'"></script>';
			}
		}
	?>
</body>
</html>