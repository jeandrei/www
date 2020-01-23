<!--ESSE É DE TESTE COM APENAS ALGUNS CAMPOS-->

<?php ini_set('default_charset', 'utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SITENAME; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    
    <!--Font Awesome CDN-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css"> 
    
    <!--jquery-->
    <script src="<?php echo URLROOT; ?>/js/jquery-3.1.1.js"></script> 

    <!--jquery validation-->
    <script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script> 

    <!--jquery mask-->
    <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script> 

    <!--Botstrap main-->
    <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    
    <!--Javascript funções-->
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>  

    <script src="<?php echo URLROOT; ?>/js/fileinput.js"></script> 
    
  
</head>

<body style="background-color:#DCDCDC">
    <div class="container" style="margin-top: 90px;">
   






     
    
    <form id="cadastrar" action="<?php echo URLROOT; ?>/filas/cadastrar" method="post">  



<!--NOME DO RESPONSÁVEL-->
<div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="responsavel">
                    <span class="obrigatorio">*</span>Nome completo do responsável:
                </label>
                <input 
                    type="text" 
                    name="responsavel" 
                    id="responsavel"
                    class="form-control <?php echo (!empty($data['responsavel_err'])) ? 'is-invalid' : ''; ?>" 
                    value="<?php htmlout($data['responsavel']); ?>"
                    onkeydown="upperCaseF(this)"                                            
                >
                    <span class="invalid-feedback">
                        <?php echo $data['responsavel_err']; ?>
                    </span>
            </div>
        </div>
    <!--NOME DO RESPONSÁVEL-->
    </div>



<!--LINHA NOVA PARA OS CELULARES-->
<div class="row">
    <!--CELULAR 1-->
    <div class="col-lg-6">
        <label for="telefone">
            <span class="obrigatorio">*</span>Telefone para contato:
        </label>
        <input 
            type="text" 
            name="telefone" 
            id="telefone" 
            maxlength="15"
            class="form-control telefone <?php echo (!empty($data['telefone_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php htmlout($data['telefone']); ?>"
            >
            <span class="invalid-feedback">
                <?php echo $data['telefone_err']; ?>
            </span>
    </div>


    

    <input class="form-control" id="ImagemUpload" name="ImagemUpload" type="file" value="">



                                                
       
       
       
        <!--BOTÃO ENVIAR DADOS-->
        <div class="row">
            <div class="col-lg-12">
                <input 
                    type="submit" 
                    class="btn btn-success btn-block btn-lg" 
                    value="Enviar dados" 
                    name="btn_enviar"                            
                >                        
        <!--BOTÃO ENVIAR DADOS-->
        </div>


                                           
    </form>







</div><!--fecha div container lá do header-->
</body>
</html>

<script> 


// tem que adicionar o método accept primeiro para depois funcionar na função lá embaixo
jQuery.validator.addMethod("accept", function (value, element, param) 
{
   return value.match(new RegExp("." + param + "$"));
});

jQuery.validator.addMethod("filesize_max", function(value, element, param) {
    var isOptional = this.optional(element),
        file;
    
    if(isOptional) {
        return isOptional;
    }
    
    if ($(element).attr("type") === "file") {
        
        if (element.files && element.files.length) {
            
            file = element.files[0];            
            return ( file.size && file.size <= param ); 
        }
    }
    return false;
}, "File size is too large.");


//TAMANHO É EM KBYTES LOGO PARA 2MB 2*1024 = 2048*1024 BYTES = 2097152 
 $(document).ready(function(){
        $('#cadastrar').validate({
            rules : {			
                responsavel : {
                    required : true,
                    minlength : 6
                },
                telefone : {
                    required : true                    
                },
                ImagemUpload : {
                    required : true,      
                    filesize_max : "2097152"
                }                
            },

            messages : {			
                responsavel : {
                    required : 'Por favor informe o responsável.',
                    minlength : 'Nome inválido, mínimo 6 Caracteres'
                },
                telefone : {
                    required : 'Por favor informe o telefone.'
                },  
                ImagemUpload : {
                    required : 'Arquivo requerido.', 
                    filesize_max : 'Arquivo excede os 2MB, se você estiver usando um dispositivo móvel reduza a qualidade da fotografia'                   
                }                
            }
        });
});









</script>
