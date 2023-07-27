<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Grupo 05</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <style>
            html, body {
                background-color: #212020;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #webs{
                background: #EDEDED;
                text-align: center;
                padding: 20px;
            }

            #contacts{
                background: white;
                text-align: center;
                padding: 20px;
            }

            #webs article{
            -webkit-box-shadow: 0px 0px 22px -15px rgba(0,0,0,0.41);
            -moz-box-shadow: 0px 0px 22px -15px rgba(0,0,0,0.41);
            box-shadow: 0px 0px 22px -15px rgba(0,0,0,0.41);
                background: #212020;
                
                
                display: inline-block;
                color: white;
                width: 20%;
                margin: 10px;
                font-family: 'Advent Pro', sans-serif;
            }

            #contacts article{
                
                display: inline-block;
                padding: 10px;
                width: 20%;
                margin: 10px;
            }
            
            #webs article img{
                padding-bottom: 10px;
            }

            #webs article{
                -webkit-transition:.2s;
                -moz-transition:.2s;
            }

            #webs article:hover{
                -webkit-transform:scale(1.1);
                -moz-transform:scale(1.1);
            }
          
            
            @media (max-width: 600px){
                .full-height {
                height: 8vh;
            }
            }

            @media (max-width: 600px){
            h4{
            font-size: 20px;
            }
            p{
                font-size: 18px;
            }

            

            #webs article{
                width: 90%;
            }

            #contacts article{
                width: 90%;
            }

            #info #fuente{
                width: 90%;
            }

            #foto{
                width: 80px;
                height: 80px;
            }
            
            header .caja{
                padding: 0px;
            }

        }

        @media (max-width: 900px){
            h4{
                font-size: 20px;
            }
        }
        </style>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://paginadeldistrito.com/wp-content/uploads/2019/10/Instituto-Educaci%C3%B3n-Secundaria-Rejas-03-1024x570.jpg" class="d-block w-100" alt="..." height="400">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                            
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://2.bp.blogspot.com/-34HVCWxIBNU/VCBONKjA4WI/AAAAAAAAAzc/uAsroidoTGY/s1600/Taller_FPB_18_sep_2014.jpg" class="d-block w-100" alt="..." height="400">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://tecnolite.lat/blog/especialistas/files/2016/06/Screenshot_5-1024x680.jpg" class="d-block w-100" alt="..." height="400">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>        
        
            <section id="webs">
            
            <br>
            <h1><b>Carreras Tecnicas</b></h1>
            <br>
            <article>
                <img src="https://www.averbum.cl/wp-content/uploads/2021/08/1.QUC_-ES-LA-OFIMC_TICA-1024x480.jpg" alt="mi web" height="180" width="100%">
                <h4>Ofimatica</h4>
                <p></p>
            </article>

            <article>
                <img src="https://camiper.com/tiempominero-noticias-en-mineria-para-el-peru-y-el-mundo/wp-content/uploads/2019/10/camiper_metalurgia_maestr%C3%ADa_.jpg" alt="mi web" height="180" width="100%">
                <h4>Siderurgia</h4>
                <p></p>
            </article>

            <article>
                <img src="https://electricidadindustrialsite.files.wordpress.com/2017/04/x.jpg?w=1170" alt="mi web" height="180" width="100%">
                <h4>Electricidad</h4>
                <p></p>
            </article>

            <article>
                <img src="https://weremote.net/wp-content/uploads/2022/07/paletas-colores-ordenador-escritorio.jpg" alt="mi web" height="180" width="100%">
                <h4>Diseño grafico</h4>
                <p></p>
            </article>
            <br>
            <br>
            <br>
            <br>
            <h1><b>La mejor enseñanza para nuestros estudiantes</b></h1>
        </section>
        
        <div class="row no-gutters bg-light position-relative">
          <div class="col-md-6 mb-md-0 p-md-4">
            <img src="https://panoramad.com.pe/images/noticias/nacionales/sociedad/2022/julio/depositphotos_9274525-stock-photo-teacher-with-high-school-students.jpg" class="w-100" alt="..." height="400">
          </div>
          <div class="col-md-6 position-static p-4 pl-md-0">
            <h5 class="mt-0"><b>El arte de nuestra profesion es amar la sonrisa de los demas</b></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            <a href="#" class="stretched-link">Go somewhere</a>
          </div>
        </div>

        <div class="row no-gutters bg-light position-relative">
            <div class="col-md-6 position-static p-4 pl-md-20">
            <h5 class="mt-0"><b>La mejor forma de aprendes, es practicando</b></h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            
            <a href="#" class="stretched-link">Go somewhere</a>
          </div>
          <div class="col-md-6 mb-md-0 p-md-4">
            <img src="https://maestros.com.co/wp-content/uploads/2020/10/Primer-laboratorio-en-la-industria-siderurgica-acreditado-en-Colombia-obra-maestros-construccion-diseno-arquitectura-obra-contratista-Colombia-660x330.jpeg" class="w-100" alt="..." height="400">
          </div>
          
        </div>
        <div class="jumbotron jumbotron-fluid" style="background: ligthgray;">
            <div class="container">
                <h1 class="display-4" style="color: red">Instituto CEA</h1>
                <h3> La mejor opcion </h3><br>
                <h2><b>Quienes somos?</b></h2>
                <h4>Somos una empresa comprometida con sus estudiantes, que cuenta con muchos años de experiencia.</h4>
            </div>
        </div>
    <section id="contacts">
        <article>
            <li style="list-style: none;">
                <a href="#"><img src="http://www.odontoking.com/images/ico-celular.png" alt=""></a>
                <p>LLAMANOS <strong>71017179 <br/> 3362669 - 3344830</strong></p>
            </li>
        </article>
        <article>
            <li style="list-style: none;"><a href="#"><img src="http://www.odontoking.com/images/ico-mail.png" alt=""></a>
                <p>ESCRIBENOS<br /> <strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="91f8fff7fed1fef5feffe5fefaf8fff6bff2fefc">institutocea@gmail.com</a></strong></p>
            </li>
        </article>
        <article>
            <li style="list-style: none;"><a href="#"><img src="http://www.odontoking.com/images/ico-ubicacion.png" alt=""></a>
                <p>ALAMEDA JUNIN #409<br /> <strong> ENTRE 1ER Y 2DO ANILLO </strong></p>
            </li>
        </article>
    </section>

        <footer>
            <div class="alert" role="alert" style="background:#212020 ; color: white;">
                A simple info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>