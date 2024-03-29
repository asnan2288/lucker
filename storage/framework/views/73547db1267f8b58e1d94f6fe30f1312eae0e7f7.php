<?php $__env->startSection('content'); ?>

<script src="/dash/js/dtables.js?v=<?php echo e(time()); ?>" type="text/javascript"></script>
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Боты</h3>
    </div>
</div>

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-user"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Список ботов
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a data-toggle="modal" href="#new" class="btn btn-success btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Добавить
                        </a>
                    </div>  
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="bots">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Логин</th>
                        <th>Действия</th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Добавление бота</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="kt-form-new" method="post" action="<?php echo e(route('admin.bots.create')); ?>" id="save">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Логин бота:</label>
                        <input type="text" class="form-control" placeholder="" name="username" minlength="6" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/bots/index.blade.php ENDPATH**/ ?>