<?php $__env->startSection('title', 'Product Categories'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>


<?php $__env->startSection('content'); ?>

<div class="container-fluid">

<?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">

<div class="col-xl-12">
    
    <div class="card m-b-30">
        

        <div class="card-body">
            <div class="col">
            <div class="col-xl-4 float-left">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-success" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>
            <form action="/admin/product/categories" method="post">
            <div class="col-xl-4 float-right">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Add Category">
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <div class="input-group-append">
                    <input type="submit" class="btn btn-success" value="Add" id="button-addon2">
                    </div>
                </div>
            </div>
            </form>
            </div>
         
               <div class="table-responsive">
                <h4 class="mt-0 header-title">Category Tables</h4>
                <?php if(count($categories)): ?>
                <table class="table table-hover">
                    <thead>
                        <tr class="titles">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i =1; ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="c-table__cell"><?php echo $i; ?></td>
                            <td class="c-table__cell"><?php echo e($category['name']); ?></td>
                            <td class="c-table__cell"><?php echo e($category['slug']); ?></td>
                            <td class="c-table__cell"><?php echo e($category['added']); ?></td>
                            <td class="c-table__cell">
                                <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal-<?php echo e($category['id']); ?>">
                                <i class="mdi mdi-plus"></i></button>
                                <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#exampleModal-<?php echo e($category['id']); ?>">
                                <i class="fa fa-edit"></i></button>
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php $i++; ?>

                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal-<?php echo e($category['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="notification"></div>
                                        <form>
                                            <div class="form-group">
                                            <input type="text" id="item-name-<?php echo e($category['id']); ?>" name="name"  value="<?php echo e($category['name']); ?>"class="form-control">
                                            
                                            <small id="emailHelp" class="form-text text-muted">Here edit category for your product.</small>
                                            </div>
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="submit" value="update" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" class="btn btn-success update-category" id="<?php echo e($category['id']); ?>">
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                    </tbody>
                </table>
        <!-- table end -->
        <!-- pagination start -->
                <hr>
                <ul class="pagination justify-content-end">
                        <?php echo $links; ?>

                </ul>
                
                <?php else: ?>
                <p> You have not created any categories </p>
                <?php endif; ?>
            </div>
            
        </div>
  </div>
</div>
<!-- Page content Wrapper -->

</div>

<div class="row">
<div class="col-md-12">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Sub Category Tables</h4>
            <div class="table-responsive">
            
                <table class="table table-hover">
                    <thead>
                        <tr class="titles">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Action</th>
                            
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td class="c-table__cell">1</td>
                            <td class="c-table__cell">Dell Laptop</td>
                            <td class="c-table__cell">dell</td>
                            <td class="c-table__cell">2011/04/25</td>
                            <td class="c-table__cell">
                                <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-edit"></i></button>
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
        
    </div>
</div>
</div>
 <!-- container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>