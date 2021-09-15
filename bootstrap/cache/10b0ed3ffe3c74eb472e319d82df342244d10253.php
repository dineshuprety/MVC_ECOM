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
                <table class="table table-hover" data-form="deleteForm">
                    <thead>
                        <tr class="titles">
                            <!-- <th>Id</th> -->
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td class="c-table__cell"><?php echo e($category['name']); ?></td>
                            <td class="c-table__cell"><?php echo e($category['slug']); ?></td>
                            <td class="c-table__cell"><?php echo e($category['added']); ?></td>
                            <td class="c-table__cell">
                                <!-- add sub category button -->
                                <span data-toggle="tooltip" data-placement="top" title="Add SubCategory">
                                <button type="button"  class="btn-sm btn-primary" data-toggle="modal" data-target="#add-subcategory-<?php echo e($category['id']); ?>">
                                <i class="mdi mdi-plus"></i></button>
                                </span>
                                <!-- Edit category button -->
                                <span data-toggle="tooltip" data-placement="top" title="Edit Category">
                                <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#exampleModal-<?php echo e($category['id']); ?>">
                                <i class="fa fa-edit"></i></button>
                                </span>
                                <!-- deleted category button -->
                                <span data-toggle="tooltip" data-placement="top" title="Delete Category"style="display:inline-block">
                                <form method="POST" action="/admin/product/categories/<?php echo e($category['id']); ?>/delete" class="delete-item">
                                <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                <button type="submit" class="btn-sm btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-trash"></i></button>
                                </from>
                            </span> 
                            </td>
                        </tr>
                        <!-- Modal category -->
                            <div class="modal fade" id="exampleModal-<?php echo e($category['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                    <a href="/admin/product/categories" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                   
                                    </div>
                                    <div class="modal-body">
                                        <div class="notification alert alert-success"></div>
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
                            <!-- end of category -->

                            <!-- add sub category -->
                            <div class="modal fade" id="add-subcategory-<?php echo e($category['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add SubCategory</h5>
                                    <a href="/admin/product/categories" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                   
                                    </div>
                                    <div class="modal-body">
                                        <div class="notification alert"></div>
                                        <form>
                                            <div class="form-group">
                                            <input type="text" id="subcategory-name-<?php echo e($category['id']); ?>"class="form-control">
                                            
                                            <small id="emailHelp" class="form-text text-muted">Here Add Subcategory for your product.</small>
                                            </div>
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="submit" value="create" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" class="btn btn-success add-subcategorybtn" id="<?php echo e($category['id']); ?>">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- end of subcategory -->
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

<!-- sub category table -->
    <div class="row">

    <div class="col-xl-12">
    
    <div class="card m-b-30">
        

        <div class="card-body">
            
               <div class="table-responsive">
                <h4 class="mt-0 header-title">Sub Category Tables</h4>
                <?php if(count($subcategories)): ?>
                <table class="table table-hover" data-form="deleteForm">
                    <thead>
                        <tr class="titles">
                            <!-- <th>Id</th> -->
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td class="c-table__cell"><?php echo e($subcategory['name']); ?></td>
                            <td class="c-table__cell"><?php echo e($subcategory['slug']); ?></td>
                            <td class="c-table__cell"><?php echo e($subcategory['added']); ?></td>
                            <td class="c-table__cell">
                               
                                <!-- Edit category button -->
                                <span data-toggle="tooltip" data-placement="top" title="Edit SubCategory">
                                <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#item-subcategory-<?php echo e($subcategory['id']); ?>">
                                <i class="fa fa-edit"></i></button>
                                </span>
                                <!-- deleted subcategory button -->
                                <span data-toggle="tooltip" data-placement="top" title="Delete SubCategory"style="display:inline-block">
                                <form method="POST" action="/admin/product/subcategory/<?php echo e($subcategory['id']); ?>/delete" class="delete-item">
                                <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                <button type="submit" class="btn-sm btn-danger delete" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-trash"></i></button>
                                </from>
                            </span> 
                            </td>
                        </tr>
                        <!-- Modal edit subcategory -->
                            <div class="modal fade" id="item-subcategory-<?php echo e($subcategory['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory</h5>
                                    <a href="/admin/product/categories" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                   
                                    </div>
                                    <div class="modal-body">
                                        <div class="notification alert alert-success"></div>
                                        <form>
                                            <div class="form-group">
                                            <input type="text" id="item-subcategory-name-<?php echo e($subcategory['id']); ?>"
                                                   value="<?php echo e($subcategory['name']); ?>"class="form-control">
                                            
                                            <small id="emailHelp" class="form-text text-muted">Here edit category for your product.</small>
                                            </div>
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="submit" value="update" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" class="btn btn-success update-category" id="<?php echo e($subcategory['id']); ?>">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- end of category -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                    </tbody>
                </table>
        <!-- table end -->
        <!-- pagination start -->
                <hr>
                <ul class="pagination justify-content-end">
                <?php echo $subcategories_links; ?>

                </ul>
                
                <?php else: ?>
                <p> You have not created any Subcategories </p>
                <?php endif; ?>
            </div>
            
        </div>
  </div>
</div>
        

    </div>
<!-- End sub category table -->

 <!-- container -->
 <?php echo $__env->make('includes.delete-model', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>