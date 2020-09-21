
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>web demo</title>
	 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
    	.brand{
    		background-color: #cbb09c!important;
    	}
    	.brand-text{
    		color: #cbb09c!important;
    	}
    	form{
    		max-width: 460px;
    		margin:20px auto;
    		margin-bottom: 100px;

    	}
    </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
		<div class="container">
			<a href="../../php_sun/templade/" class="brand-logo brand-text">LOGO</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
                <?php if(isset($_SESSION['user'])){ ?>
                <li class="red-text">welcome: <?php echo $_SESSION['user']; ?></li>
				<li><a href="../../php_sun/add.php" class="btn brand z-depth-0">thêm sản phẩm mới</a></li>
                <li><a href="../../php_sun/templade/logout.php" class="btn brand z-depth-0">đăng xuất</a></li>
                <?php } ?>
			</ul>
		</div>
	</nav>