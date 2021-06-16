
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Categorias
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/categorias/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>   Agregar Categoria</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($categorias)):?>
                                    <?php foreach($categorias as $categoria):?>
                                        <tr>
                                            
                                            <td><?php echo $categoria->id;?></td>
                                            <td><?php echo $categoria->nombre;?></td>
                                            <td><?php echo $categoria->descripcion;?></td>

                                            <td>
                                                

                                                  <!-- ICONO VER -->
                                                  <button style="margin-left: 10px" type="button" class="btn btn-success btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $categoria->id;?>">
                                                  <span class="fa fa-eye">  Ver</span></button>
                                                    
                   
                                                    
                                             
                                                    <!-- ICONO EDITAR   --> 
                                                    <a href="<?php echo base_url()?>mantenimiento/categorias/edit/<?php echo $categoria->id;?>" class="btn btn-primary">
                                                        <span class="fa fa-pencil"></span>  Editar</a>
                                                         
                                                    <!-- ICONO ELIMINAR -->
                                                    <a href="<?php echo base_url();?>mantenimiento/categorias/delete/<?php echo $categoria->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span>  Eliminar</a>
                                                    </td>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
