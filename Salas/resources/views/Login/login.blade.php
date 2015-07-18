<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>...</title>
    {!!Html::style('css/login.css')!!}
</head>
<body>
<div class="container">
    <section id="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!!Form::open(['url' => 'admin/login', 'method'=> 'POST'])!!}
            <h1>UTEM</h1>
            <div>
                <input type="text" placeholder="Rut Dirdoc" required="" id="username" name="rut" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="password" name="password"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
                <a href="#">Olvido su contraseña?</a>
            </div>
        {!!Form::close()!!}
    </section><!-- content -->
</div><!-- container -->
</body>
</html>