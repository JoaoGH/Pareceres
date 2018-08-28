<!DOCTYPE html>
<html>
    <head>
        <script src="../js/inicio.js"></script>
        <link rel="shortcut icon" href="../img/logo.png">
        <meta charset="UTF-8">
        <link href="../css/freelancer.min.css" rel="stylesheet">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Pareceres</title>
        <style>
            .topo{
                width: 100%;
                height: 50px;
                float: right;
                text-align: center;
                word-spacing: 50px;
            }
            textarea{
                min-width: 60%;
                max-width: 60%;
                max-height: 200pt;
                min-height: 200pt;
                display: inline-table;
            }
        </style>
    </head>
    <body class="index">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom" style="margin: -10px 0 0 0">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display 
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#page-top">Precisa de uma Bike?</a>
                </div>
                -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#" onclick="cadastrarParecer()">Cadastrar parecer</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#" onclick="cadastrarAlunos()">Cadastrar alunos</a>
                        </li>
                        <li class="page-scroll">
                            <a href="ExecPDF.php">Gerar PDF</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <br><br><br><br>

        <header>
            <div class="container" id="maincontent" tabindex="-1" style="margin-top: -100px">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-text">
                            <h3 class="name">Pareceres Bernado Lemke</h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="context">
                        <div id="elementos">
                            <form>
                                <hr>
                                <h2>Instruções</h2>
                                <hr>

                                <h3>1º Passo: <small>Cadastre todos os pareceres das materias nas suas respectivas turmas                           </small></h3>
                                <h3>2º Passo: <small>Cadastre todos os alunos de cada turma, e seu conceito (A, B, C, D, E)                         </small></h3>
                                <h3>3º Passo: <small>Clique no botão 'Gerar PDF', então o sistema irá gerar um pdf dos pareceres, basta só imprimir!</small></h3> 
                                
                                <input type="submit" onclick="textos()" value='Emergência'>
                            </form>
                        </div>
                    </div><br><br><br><br>
                </div>
            </div>
        </div>
    </body>
</html>

