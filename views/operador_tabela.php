
<div class="container divform ">

    <table class="table table-light table-striped table-sm table-hover text-center">
        <thead>		
            <tr>
                <th>ID</th> 			
                <th>DESCRIÇÃO</th>                 					
                <th>EXCLUIR</th>					
            </tr>
        </thead>
        <tbody>	
        <?php
            foreach ($tabela as $v)
            { 
                echo "
                <tr> 
                    <td> ".$v['ID']." </td>
                    <td> ".$v['DESC']." </td>   
                    <td> <a href='index.php?p=operador&id=".$v['ID']."' class='btn_edit text-dark'> <i class='fa fa-trash' aria-hidden='true'></i> </td>
                </tr> 
                ";
            }                         
        ?>   		
        </tbody>
        <tfoot>
            <th></th> 			
            <th></th>                 					
            <th></th>	
        </tfoot>
    </table>   

</div>

