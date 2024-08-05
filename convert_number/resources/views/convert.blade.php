<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Sistema de conversão de números reais para romanos e romanos para reais.">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel">
    <meta name="author" content="Jefferson Ricardo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demander</title>
    <link rel="shortcut icon" href="/img/unnamed-ConversImagem.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="wrapper">
        <div class="convert_box">
            <div class="convert-header">
                <span>Conversor</span>
            </div>
            <div class="logo">
                <img src="/img/logo_demander_white_forca_de_vendas.png" alt="Logo Demander" width="200px">
            </div>
            <form action="" method="post">

                <!-- campo para receber o valor a ser convertido -->
                @csrf
                <div class="input_box text-center">
                    <label for="exampleFormControlInput1" class="form-label">Número</label>
                    <input class="form-control cor-bg" name="num" type="text" placeholder="Digite um número" aria-label="default input example" value>
                </div>
                <div class="input_box text-center">

                    <!-- label para exibir o valor solicitado -->
                    <label for="disabledTextInput" class="form-label"> Número solicitado: <span class="valor_final">
                        <?php
                            if(!empty($valor)){
                                echo $valor;
                            }
                        ?>
                        </span>
                    </label>

                    <!-- label para exibir o valor solicitado com o resultado da conversão -->
                    <label for="disabledTextInput" class="form-label"> Valor convertido: <span class="valor_final">
                        <?php
                            if(!empty($resultado)){
                                echo $resultado;
                            }
                        ?>
                        </span>
                    </label>

                    <!-- label para exibir o erro de valor inválido -->
                    <label for="disabledTextInput" class="form-label"><span class="valor_final">
                        <?php
                            if(!empty($error)){
                                echo $error;
                            }
                        ?>
                        </span>
                    </label>
                </div>

                <!-- botão para converter -->
                <div class="input_box">
                    <button type="submit" class="btn converter">Converter</button>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>