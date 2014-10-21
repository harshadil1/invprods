<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<meta name="description" content="description">'; ?>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
    queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file: -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
    html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
    respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="container">
        <header id="header">
            <nav id="main_menu">
                <h2>Main Navigation</h2>
            </nav>
        </header>
    </div>
    <div id="sections-container">
        {content}
    </div>
    <footer id="footer" class="footer">
        This is footer
    </footer>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>