<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>...</title>
    {!!Html::style('css/login.css')!!}
</head>
<body>
<div class="container">
    <section id="content">
        {!!Form::open(['url' => 'admin/login', 'method'=> 'POST'])!!}
            <h1>UTEM</h1>
            <div>
                <input type="text" placeholder="Rut Dirdoc" required="" id="username" name="username" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="password" name="password"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
                <a href="#">Lost your password?</a>
                <a href="#">Register</a>
            </div>
        {!!Form::close()!!}
    </section><!-- content -->
</div><!-- container -->
</body>
</html>