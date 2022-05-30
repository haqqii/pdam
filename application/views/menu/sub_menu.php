<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubmenuModal">Add New Submenu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                     foreach ($user_sub_menu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success" data-toggle="modal" data-target="#modalEdit<?= $sm['id'] ?>">Edit</a>
                                <a href="#" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuSubmodalLabel">Add Submew Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/sub_menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Submenu title" name='title'>
                    </div>

                    <div class="form-group">
                        <div class="select">
                            <select name="menu" id="menu" class="form-control">
                            <option value="0">Pilih Menu</option> 
                            <?php $menu = $this->db->get('user_menu')->result_array();
                                foreach($menu as $r ): ?>
                                <option value="<?= $r['id'] ?>"><?= $r['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" placeholder="Submenu url" name='url'>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" placeholder="Submenu icon" name='icon'>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="id_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<?php
    foreach ($user_sub_menu as $m ) {
?>
<div class="modal fade" id="modalEdit<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuSubmodalLabel">Add Submew Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/ubah_sub_menu/').$m['id']; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Submenu title" name='title' value="<?= $m['title'] ?>">
                    </div>

                    <div class="form-group">
                        <div class="select">
                            <select name="menu" id="menu" class="form-control">
                            <option value="0">Pilih</option> 
                            <?php $menu = $this->db->get('user_menu')->result_array();
                                foreach($menu as $r ): ?>
                                <option value="<?= $r['id'] ?>" <?= $r['menu'] == $r['menu'] ? 'selected': ''; ?>><?= $r['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" placeholder="Submenu url" name='url' value="<?= $m['url'] ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" placeholder="Submenu icon" name='icon' value="<?= $m['icon'] ?>">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="id_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php } ?>