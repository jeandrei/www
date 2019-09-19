<?php
    // TEM QUE SER EM UM HEADER E FOOTER DIFERENTE POIS SE NÃO VAI TRAZER O NAVBAR JUNTO
    include 'header.php';
?>
<div class="principal">
    <!-- Primeira linha -->
    <div class="row alert alert-success" role="alert">

        <!-- Primeira coluna da primeira linha -->
        <div class="col text-center">
            <h4 class="alert-heading">Cadastro realizado com sucesso!</h4>
        </div>       

    </div>

    <div class="row">

        <!-- Primeira coluna da primeira linha -->
        <div class="col text-center">
        <h4> Anote o número do seu protocolo:</h4><h1>Potocolo:<?php echo  $protocolo=123456; ?></h1>
          <p style="font-style:italic;">Quando da disponibilidade de uma vaga para a sua solicitação e respeitando a ordem de inscrição, a secretaria de educação entrará em contato
            para o processo de matrícula do aluno.
            Dúvidas podem ser sanadas nos telefones:<br>
            <br>(47) 3345-4025
            <br>(47) 3345-2388            
          </p>
        </div>       

    </div>             
    <hr>
    Informações do seu cadastro:

    <!-- BLOCO PARA INFORMAÇÕES -->
    <div class="bloco" style="margin-top:70px;">
        <!-- Segunda linha -->
        <div class="row">

            <!-- Primeira coluna da Segunda linha -->
            <div class="col text-right">
                TEXTO 1
            </div>   

            <!-- Segunda coluna da Segunda linha -->
            <div class="col text-left">
                TEXTO 2
            </div>    

            <!-- Terceira coluna da Segunda linha -->
            <div class="col text-center">
                TEXTO 2
            </div>       

        </div>
    </div>
</div>
<?php 
    include 'footer.php';
?>
