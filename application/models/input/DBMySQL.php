<?php

//Instance interface
get_instance()->load->iface('InputParser');

class DBMySQL extends CI_Model implements InputParser
{
    public function getForm()
    {
        $form = '
            <form>
                <div class="form-group">
                    <label>Host</label>
                    <input type="text" class="form-control" name="db-host" id="db-host" value="localhost">
                </div>
                <div class="form-group">
                    <label>User</label>
                    <input type="text" class="form-control" name="db-user" id="db-user" value="root">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="db-pass" id="db-pass" value="">
                </div>
                <button type="button" class="btn btn-outline-success">Connect</button>
                </form>
';
        return $form;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
    }
}
